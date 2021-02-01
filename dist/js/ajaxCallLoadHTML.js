$(document).ready(function () {
  window.ajaxCallLoadHTML = function ajaxCallLoadHTML(
    type, // post/get [required]
    url, //URL to post form data to [required]
    jsonData, //key-value pairs (type = String) submitted to db {name:jdslk, age:25}
    htmlElementWrapper, //HTML element that will contain the html data we're about to get
    callbackFunction //function to call after success [default = null]
  ) {
    $.ajax({
      url: url,
      type: type,
      data: JSON.parse(jsonData),
      dataType: "json",
      beforeSend: function () {},
      success: function (response) {
        if (response.status == true) {
          if (callbackFunction) {
            callbackFunction(response.message);
          }
          htmlElementWrapper.html(response.message);
        } else {
          console.log(response);
          htmlElementWrapper.html(
            '<span class="badge badge-danger">Data loading failed</span>'
          );
        }
      },
      error: function (error) {
        console.log(error);
        htmlElementWrapper.html(
          '<span class="badge badge-danger">Data loading failed.</span>'
        );
      },
      complete: function () {},
    }); //end $.ajax(CALL)
  }; // end ajaxCallLoadHTML()
}); //end document.ready

/* let myPromise = new Promise((resolve, reject) => {
  //check if user is sure of action
  if (true) {
    resolve();
  } else {
    reject();
  }
});
myPromise
  .then(() => {
    //if resolve
  })
  .catch(() => {
    //if reject
  }); */
