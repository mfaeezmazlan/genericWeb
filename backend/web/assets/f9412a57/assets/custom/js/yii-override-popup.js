/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
yii.confirm = function (message, okCallback, cancelCallback) {
    $("#modal-title").html("Alert");
    $("#modal-body").html(message);
    $("#deleteModal").modal();
    $("#confirmDelete").click(okCallback);
    $("#confirmDelete").click(cancelCallback);
};

