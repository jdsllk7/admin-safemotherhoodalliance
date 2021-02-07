$(document).ready(function () {
  // alert(90);
  $(document).on("submit", ".emailBlogForm", function (event) {
    event.preventDefault();
    let form = $(this);
    //optional confirmation box
    dialogBox(
      "Are you sure you want to share this blog?", //message
      "confirm", //type
      function () {
        //Ajax Call
        ajaxCallForm(
          "post", //post get [required]
          form, //HTML form: $(this) [required]
          null, //HTML form: (this) if it contains files on submit [default = null | value = this]
          false, //If form submit contains files true/false [required]
          "includes/emailBlog.inc.php", //URL to post form data to [required]
          false, //should we redirect after success? true/false [required]
          "", //URL to redirect to if response = success [default = empty string]
          myCallback //function to call after success [default = null]
        );

        //function to be called back upon ajax success
        function myCallback(form, responseMessage) {
          setTimeout(function () {
            ajaxCallLoadHTML(
              "post",
              "includes/blogDisplay.inc.php",
              "{}",
              $(".blogsCover"),
              null
            );
            dialogBox(responseMessage, "success", null);
          }, 500);
        } //end myCallback()
      }
    ); // end dialogBox()
  });
});
