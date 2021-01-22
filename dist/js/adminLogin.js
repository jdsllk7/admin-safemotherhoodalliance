$(document).ready(function () {
  $("#adminLoginForm").submit(function (event) {
    event.preventDefault();
    //call general ajax request (with call back function)
    ajaxCall(
      "post",
      $(this),
      "includes/adminLogin.inc.php",
      true,
      "index.php",
      null
    );

    /* function myCallback(result) {
      alert(result);
    } */
  });
});
