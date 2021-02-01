$(document).ready(function () {
  window.blogShareURL = function blogShareURL() {
    var x = document.URL;
    document.getElementById("jinu").src =
      "https://www.facebook.com/plugins/share_button.php?href=" +
      x +
      "&layout=button_count&size=large&mobile_iframe=true&width=83&height=28&appId";
  };
}); //end document.ready
