$(document).ready(function () {
  window.ajaxCall = function ajaxCall(
    type, //post or get
    form, //form ID: $(this)
    url, //URL to post form data to
    redirectStatus, //should we redirect after success? true/false
    redirectURL, //URL to redirect to if response = success
    callbackFunction //pass call back function or NULL
  ) {
    //house keeping
    let submitBtn = form.closest("form").find(":submit");
    let submitBtnText = submitBtn.html();
    let feedbackMsg = form.closest("form").children(".feedbackMsg");
    $.ajax({
      type: type,
      url: url,
      data: form.serialize(),
      dataType: "json",
      beforeSend: function () {
        submitBtn.html('<i class="fa fa-spinner fa-spin text-white"></i>');
        submitBtn.prop("disabled", true);
        feedbackMsg.hide();
        feedbackMsg.fadeIn();
      },
      success: function (response) {
        console.log(response);
        feedbackMsg.html(response.message);
        if (response.status == true) {
          form.trigger("reset");
          feedbackMsg.removeClass("text-danger");
          feedbackMsg.addClass("text-success");
          if (redirectStatus) {
            setTimeout(function () {
              window.location.replace(redirectURL);
            }, 2000);
          }
          if (callbackFunction) {
            callbackFunction(response.status);
          }
        } else {
          feedbackMsg.removeClass("text-success");
          feedbackMsg.addClass("text-danger");
        }
      },
      error: function (error) {
        console.log(error);
        feedbackMsg.html("System error, please try again!");
        feedbackMsg.removeClass("text-success");
        feedbackMsg.addClass("text-danger");
      },
      complete: function () {
        submitBtn.prop("disabled", false);
        submitBtn.html(submitBtnText);
      },
    });
  }; // end ajaxCall()
}); //end document.ready
