<!-- header -->
<?php
$title = "Admin - Home | Safe Motherhood Alliance";
include_once 'includes/partials/header.inc.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Blogs</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Blogs</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <!-- small card -->
        <div class="col-lg-5 col-md-6">
          <div class="card height-400">
            <div class="card-body">
              <form class="d-flex flex-column align-items-center text-center" id="blogSubmitForm" enctype="multipart/form-data">
                <h4 class="newBlogHeader mb-3 mt-2">Create New Blog</h4>
                <img src="dist/img/site-images/placeholder.png" id="myImage" alt="image" class="border-1 border-light rounded" style="width: 270px; height: 200px;">
                <p id="myImageLoading"></p>
                <div class="form-group m-1">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file[]" multiple data-toggle="tooltip" title="Attach file" onchange="previewImgUpload(this);" style="width: 270px;" class="btn custom-file-input" accept="image/*">
                      <label class="custom-file-label text-left bg-light" for="exampleInputFile">Attach Blog Image</label>
                    </div>
                  </div>
                </div>
                <div class="form-group mt-3 text-left text-gray-dark">
                  <label>Blog Title</label>
                  <input name="blogTitle" maxlength="70" style="width: 270px;" type="text" class="form-control bg-transparent m-0" placeholder="Blog Title">
                </div>
                <div class="form-group mt-2 text-left text-gray-dark">
                  <label>Blog Text</label>
                  <textarea name="blogText" style="width: 270px; height: 150px;" style="font-size: medium;" class="form-control bg-transparent m-0" placeholder="Type blog text here"></textarea>
                </div>
                <input type="hidden" name="blogId">
                <input type="hidden" name="action" value="new">
                <pre class="feedbackMsg p-0"></pre>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-7 col-md-6">
          <h5>My Blogs</h5>
          <div class="border-1 p-1 blogsCover" style="height: 100vh; overflow-y: scroll;">

          </div>
        </div>


      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->




  

  <html>

  <body onload="myFunction()">
    <iframe id="jinu" src="" width="83" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
  </body>

  </html>



</div>
<!-- /.content-wrapper -->

<?php
include_once 'includes/partials/footer.inc.php';
?>