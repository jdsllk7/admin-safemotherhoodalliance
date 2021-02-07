$(document).ready(function () {
  window.blogShareURL = function blogShareURL() {
    var x = document.URL;
    document.getElementById("jinu").src =
      "https://www.facebook.com/plugins/share_button.php?href=" +
      x +
      "&layout=button_count&size=large&mobile_iframe=true&width=83&height=28&appId";
  };

  $(document).on("click", ".fbsharelink", function () {
    var shareurl = $(this).data("shareurl");
    window.open(
      "https://www.facebook.com/sharer/sharer.php?u=" +
        escape(shareurl) +
        "&t=" +
        document.title,
      "",
      "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600"
    );
    return false;
  });
}); //end document.ready
