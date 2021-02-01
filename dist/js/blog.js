$(document).ready(function () {
  //preload blogs on page load
  ajaxCallLoadHTML(
    "post",
    "includes/blogDisplay.inc.php",
    "{}",
    $(".blogsCover"),
    null
  );

  //save new or edit old blog
  $("#blogSubmitForm").submit(function (event) {
    event.preventDefault();
    let form = $(this);
    // console.log(new FormData(this));
    //Ajax Call
    ajaxCallForm(
      "post", //post get [required]
      form, //HTML form: $(this) [required]
      this, //HTML form: (this) if it contains files on submit [default = null | value = this]
      true, //If form submit contains files true/false [required]
      "includes/blogSubmit.inc.php", //URL to post form data to [required]
      false, //should we redirect after success? true/false [required]
      "", //URL to redirect to if response = success [default = empty string]
      myCallback //function to call after success [default = null]
    );

    //function to be called back upon ajax success
    function myCallback(form, responseMessage) {
      dialogBox(responseMessage, "success", null);
      // hide cancel btn
      $(".cancelBlogEdit").hide();
      //load back to placeholder imag
      form
        .closest("form")
        .find("img")
        .attr("src", "dist/img/site-images/placeholder.png");
      form.closest("form").find("pre").hide();
      //reload blogs
      ajaxCallLoadHTML(
        "post",
        "includes/blogDisplay.inc.php",
        "{}",
        $(".blogsCover"),
        null
      );
      /* setTimeout(function () {
        location.reload();
      }, 1000); */
    } //end myCallback()
  });

  //delete blog
  $(document).on("submit", ".deleteBlogForm", function (event) {
    event.preventDefault();
    let form = $(this);
    //optional confirmation box
    dialogBox(
      "Are you sure you want to delete this blog?", //message
      "confirm", //type
      function () {
        //Ajax Call
        ajaxCallForm(
          "post", //post get [required]
          form, //HTML form: $(this) [required]
          null, //HTML form: (this) if it contains files on submit [default = null | value = this]
          false, //If form submit contains files true/false [required]
          "includes/blogDelete.inc.php", //URL to post form data to [required]
          false, //should we redirect after success? true/false [required]
          "", //URL to redirect to if response = success [default = empty string]
          myCallback //function to call after success [default = null]
        );

        //function to be called back upon ajax success
        function myCallback(form, responseMessage) {
          setTimeout(function () {
            //delete
            form.closest(".blogPost").hide();
            dialogBox(responseMessage, "success", null);
          }, 500);
        } //end myCallback()
      }
    ); // end dialogBox()
  });

  //click to preview blog to later edit
  $(document).on("submit", ".previewBlogForm", function (event) {
    event.preventDefault();
    let previewBlogForm = $(this);
    let filePath = previewBlogForm.find("input[name='filePath']").val();
    let blogTitle = previewBlogForm.find("input[name='blogTitle']").val();
    let blogText = previewBlogForm.find("input[name='blogText']").val();
    let blogId = previewBlogForm.find("input[name='blogId']").val();
    let blogSubmitForm = $("#blogSubmitForm");
    $(".cancelBlogEdit").hide();
    previewImgSrc(filePath);
    $(".newBlogHeader").text("Edit Blog");
    blogSubmitForm.closest("form").find(":submit").text("Save Changes");
    blogSubmitForm.append(
      "<button type='button' class='btn btn-danger mt-2 cancelBlogEdit'>Cancel</button>"
    );
    blogSubmitForm.find("input[name='blogTitle']").val(blogTitle);
    blogSubmitForm.find("textarea[name='blogText']").val(blogText);
    blogSubmitForm.find("input[name='blogId']").val(blogId);
    blogSubmitForm.find("input[name='action']").val("old");
    $("pre").text("");
  });

  //cancel and on going blog edit
  $(document).on("click", ".cancelBlogEdit", function () {
    let blogSubmitForm = $("#blogSubmitForm");
    blogSubmitForm.trigger("reset");
    previewImgSrc("dist/img/site-images/placeholder.png");
    $(".newBlogHeader").text("Create New Blog");
    blogSubmitForm.closest("form").find(":submit").text("Submit");
    blogSubmitForm.find("input[name='action']").val("new");
    blogSubmitForm.find("input[name='blogId']").val("");
    $("pre").text("");
    $(this).hide();
  });

  //load selection/attached img to be preview
  window.previewImgUpload = function previewImgUpload(input) {
    $("#myImageLoading").html(
      '<i class="fas fa-spinner fa-pulse text-gray"></i>'
    );
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#myImageLoading").html("");
        $("#myImage").attr("src", e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    } // end if()
  }; //end previewImgUpload()

  //preview img with path from db
  window.previewImgSrc = function previewImgSrc(src) {
    $("#myImage").attr("src", src);
  }; //end previewImgSrc()
}); //end document.ready
