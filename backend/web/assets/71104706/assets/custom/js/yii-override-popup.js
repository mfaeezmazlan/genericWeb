yii.confirm = function (message, okCallback, cancelCallback) {
    $("#modal-title").html("Alert");
    $("#modal-body").html(message);
    $("#deleteModal").modal();
    $("#confirmDelete").click(okCallback);
    $("#confirmDelete").click(cancelCallback);
};
