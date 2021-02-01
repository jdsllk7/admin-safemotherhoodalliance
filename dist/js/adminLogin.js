$(document).ready(function () {
  $("#adminLoginForm").submit(function (event) {
    event.preventDefault();
    let form = $(this);
    //Ajax Call
    ajaxCallForm(
      "post", //post get [required]
      form, //HTML form: $(this) [required]
      null, //HTML form: (this) if it contains files on submit [default = null | value = this] 
      false, //If form submit contains files true/false [required]
      "includes/adminLogin.inc.php", //URL to post form data to [required]
      true, //should we redirect after success? true/false [required]
      "index.php", //URL to redirect to if response = success [default = empty string]
      null //function to call after success [default = null]
    );

    //function to be called back upon ajax success
    function myCallback(form, responseMessage) {
      console.log(form, responseMessage);
    } //end myCallback()
  });
});
