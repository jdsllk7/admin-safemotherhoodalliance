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
        <div class="col-md-4">
          <div class="card height-400">
            <div class="card-body">
              <form class="d-flex flex-column align-items-center text-center" id="blogSubmitForm" enctype="multipart/form-data">
                <h5>New Blog</h5>
                <img src="dist/img/site-images/placeholder.png" id="myImage" alt="image" class="border-1 border-light" style="width: 270px; height: 200px;">
                <div class="form-group m-1">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file[]" multiple data-toggle="tooltip" title="Attach file" onchange="previewImg(this);" style="width: 270px;" class="btn custom-file-input" accept="image/*">
                      <label class="custom-file-label text-left bg-light" for="exampleInputFile">Attach Blog Image</label>
                    </div>
                  </div>
                </div>
                <div class="form-group mt-3 text-left text-gray-dark">
                  <label>Blog Title</label>
                  <input name="blogTitle" style="width: 270px;" type="text" class="form-control bg-transparent m-0" placeholder="Blog Title">
                </div>
                <div class="form-group mt-2 text-left text-gray-dark">
                  <label>Blog Text</label>
                  <textarea name="blogText" style="width: 270px; height: 150px;" style="font-size: medium;" class="form-control bg-transparent m-0" placeholder="Type blog text here"></textarea>
                </div>
                <pre class="feedbackMsg p-0"></pre>
                <button type="submit" class="btn btn-light">Submit</button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <h5>My Blogs</h5>
          <div class="border-1 p-1" style="height: 100vh; overflow-y: scroll;">
            <!-- Blog Post -->

            <div class="card card-widget collapsed-card">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="dist/img/site-images/profile_female.jpg" alt="Image">
                  <span class="username"><a class="text-primary">Blog Title</a></span>
                  <span class="description">Published on - 7:30 PM | 2 Days Ago</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <form class="inline" id="previewBlogForm">
                    <input type="hidden" name="filePath" value="dist/img/logo/pink-mom-baby-logo-cropped-white-background.png">
                    <input type="hidden" name="blogTitle" value="Outreach at Mutumbi Compound">
                    <input type="hidden" name="blogText" value="The point of using Lorem Ipsum is that it hrs a morer-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.">
                    <input type="hidden" name="blogId" value="4">
                    <button type="submit" class="btn btn-tool" title="Edit Post">
                      <i class="fas fa-edit"></i>
                    </button>
                  </form>
                  <button type="button" class="btn btn-tool" title="Hide/Show Post" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                  <form class="inline" id="deleteBlogForm">
                    <input type="hidden" name="blogId" value="4">
                    <button type="submit" class="btn btn-tool" title="Delete Post">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Attachment -->
                <div class="attachment-block clearfix">
                  <img class="attachment-img" src="dist/img/site-images/no-img-1000.jpg" alt="Attachment Image">
                  <div class="attachment-pushed">
                    <h4 class="attachment-heading"><a class="text-primary">Blog Title</a></h4>
                    <div class="attachment-text">
                      Blog text
                    </div>
                  </div>
                </div>

                <!-- Social sharing buttons -->
                <button type="button" title="Share on Facebook" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Facebook</button>
                <button type="button" title="Share on Twitter" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Twitter</button>
                <button type="button" title="Share on LinkedIn" class="btn btn-default btn-sm"><i class="fas fa-share"></i> LinkedIn</button>
              </div>
            </div>

          </div>
        </div>


      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once 'includes/partials/footer.inc.php';
?>