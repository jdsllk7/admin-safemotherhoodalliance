$(document).ready(function () {
  window.previewImg = function previewImg(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#myImage").attr("src", e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    } // end if()
  }; //end previewImg()
}); //end document.ready
