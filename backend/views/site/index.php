<?php
/* @var $this yii\web\View */
$this->title = 'Generic Web';
?>
<link rel="stylesheet" href="../../vendor/bower/ace-admin-v9/assets/css/fullcalendar.css" />

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="row">
            <div class="col-sm-9">
                <div class="space"></div>

                <div id="calendar"></div>
            </div>

            <div class="col-sm-3">
                <div class="widget-box transparent">
                    <div class="widget-header">
                        <h4>Draggable events</h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <div id="external-events">
                                <div class="external-event label-grey" data-class="label-grey">
                                    <i class="icon-move"></i>
                                    My Event 1
                                </div>

                                <div class="external-event label-success" data-class="label-success">
                                    <i class="icon-move"></i>
                                    My Event 2
                                </div>

                                <div class="external-event label-danger" data-class="label-danger">
                                    <i class="icon-move"></i>
                                    My Event 3
                                </div>

                                <div class="external-event label-purple" data-class="label-purple">
                                    <i class="icon-move"></i>
                                    My Event 4
                                </div>

                                <div class="external-event label-yellow" data-class="label-yellow">
                                    <i class="icon-move"></i>
                                    My Event 5
                                </div>

                                <div class="external-event label-pink" data-class="label-pink">
                                    <i class="icon-move"></i>
                                    My Event 6
                                </div>

                                <div class="external-event label-info" data-class="label-info">
                                    <i class="icon-move"></i>
                                    My Event 7
                                </div>

                                <label>
                                    <input type="checkbox" class="ace ace-checkbox" id="drop-remove" />
                                    <span class="lbl"> Remove after drop</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<script src="../../vendor/bower/ace-admin-v9/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="../../vendor/bower/ace-admin-v9/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../../vendor/bower/ace-admin-v9/assets/js/fullcalendar.min.js"></script>
<script src="../../vendor/bower/ace-admin-v9/assets/js/bootbox.min.js"></script>


<script type="text/javascript">
    $.get("index.php?r=calendar-event/get-event",function(data){

    }).done(function(data){
        // console.log(data);

        $('#external-events div.external-event').each(function() {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });
        
    });




    /* initialize the calendar
    -----------------------------------------------------------------*/

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    
    var calendar = $('#calendar').fullCalendar({
       buttonText: {
        prev: '<i class="icon-chevron-left"></i>',
        next: '<i class="icon-chevron-right"></i>'
    },
    
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    events: $.parseJSON(data)
    ,
    editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');
            var $extraEventClass = $(this).attr('data-class');
            
            
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            
            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
            
            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
            
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
            
        }
        ,
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            bootbox.prompt("New Event Title:", function(title) {
                if (title !== null) {
                    var inStartDate = start.getFullYear()+"-"+(start.getMonth()+1)+"-"+start.getDate();
                    var inStartTime = start.getHours()+":"+start.getMinutes()+":"+start.getSeconds();
                    var inEndDate = end.getFullYear()+"-"+(end.getMonth()+1)+"-"+end.getDate();
                    var inEndTime = end.getHours()+":"+end.getMinutes()+":"+end.getSeconds();

                    $.post("index.php?r=calendar-event/insert-new-event",{title:title,startDate:inStartDate,startTime:inStartTime,endDate:inEndDate,endTime:inEndTime,allDay:allDay},function(data){

                    }).done(function(data){
                        console.log(data);
                        calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                        true // make the event "stick"
                        );
                    });
                    
                }
            });
            

            calendar.fullCalendar('unselect');
            
        }
        ,
        eventClick: function(calEvent, jsEvent, view) {

            var form = $("<form class='form-inline'><label>Change event name &nbsp;</label></form>");
            form.append("<input class='middle' autocomplete=off type=text value='" + calEvent.title + "' /> ");
            form.append("<button type='submit' class='btn btn-sm btn-success'><i class='icon-ok'></i> Save</button>");
            
            var div = bootbox.dialog({
                message: form,

                buttons: {
                    "delete" : {
                        "label" : "<i class='icon-trash'></i> Delete Event",
                        "className" : "btn-sm btn-danger",
                        "callback": function() {
                            calendar.fullCalendar('removeEvents' , function(ev){
                                return (ev._id == calEvent._id);
                            })
                        }
                    } ,
                    "close" : {
                        "label" : "<i class='icon-remove'></i> Close",
                        "className" : "btn-sm"
                    } 
                }

            });
            
            form.on('submit', function(){
                calEvent.title = form.find("input[type=text]").val();
                calendar.fullCalendar('updateEvent', calEvent);
                div.modal("hide");
                return false;
            });
            

            //console.log(calEvent.id);
            //console.log(jsEvent);
            //console.log(view);

            // change the border color just for fun
            //$(this).css('border-color', 'red');

        }
        
    });
});


</script>