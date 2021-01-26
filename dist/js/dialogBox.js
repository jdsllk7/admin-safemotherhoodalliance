$(document).ready(function () {
  window.dialogBox = function dialogBox(message, type, onConfirm) {
    console.log(message);
    var resetModalElements = function () {
      $("#modalDialogBox .modal-title").removeClass("text-success");
      $("#modalDialogBox .modal-title").removeClass("text-danger");
      $("#modalDialogBox .modal-title").removeClass("text-dark");
    };
    var modalClose = function () {
      $("#OkClose").hide();
      $("#confirmOk").hide();
      $("#confirmCancel").hide();
      $("#modalDialogBox").modal("hide");
    };
    resetModalElements();
    modalClose();
    $("#modalDialogBox").modal("show");
    $("#modalDialogBox .modal-body .modal-body-p").empty().append(message);

    /* TYPES [confirm,success,error] */
    if (type == "confirm") {
      $("#confirmOk").show();
      $("#confirmCancel").show();
      $("#modalDialogBox .modal-title").empty().append("Confirm");
      $("#modalDialogBox .modal-title").addClass("text-dark");
    } else if (type == "success") {
      $("#OkClose").show();
      $("#modalDialogBox .modal-title").empty().append("Success");
      $("#modalDialogBox .modal-title").addClass("text-success");
    } else if (type == "error") {
      $("#OkClose").show();
      $("#modalDialogBox .modal-title").empty().append("Fail");
      $("#modalDialogBox .modal-title").addClass("text-danger");
    }
    $("#confirmOk").unbind().one("click", onConfirm).one("click", modalClose);
    $("#confirmCancel").unbind().one("click", modalClose);
    $("#OkClose").unbind().one("click", modalClose);
  }; //end dialogBox()
}); //end document.ready
