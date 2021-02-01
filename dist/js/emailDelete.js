$(document).ready(function () {
  $(".emailDeleteForm").submit(function (event) {
    event.preventDefault();
    let form = $(this);
    //optional confirmation box
    dialogBox(
      "Are you sure you want to delete this email?", //message
      "confirm", //type
      function () {
        //Ajax Call
        ajaxCallForm(
          "post", //post get [required]
          form, //HTML form: $(this) [required]
          null, //HTML form: (this) if it contains files on submit [default = null | value = this] 
          false, //If form submit contains files true/false [required]
          "includes/emailDelete.inc.php", //URL to post form data to [required]
          false, //should we redirect after success? true/false [required]
          "", //URL to redirect to if response = success [default = empty string]
          myCallback //function to call after success [default = null]
        );

        //function to be called back upon ajax success
        function myCallback(form, responseMessage) {
          setTimeout(function () {
            //delete corresponding row
            form.closest("tr").hide();
            dialogBox(responseMessage, "success", null);
          }, 500);
        } //end myCallback()
      }
    ); // end dialogBox()
  });
});
