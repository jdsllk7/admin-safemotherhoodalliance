<!-- header -->
<?php
$title = "Admin - Home | Safe Motherhood Alliance";
include 'includes/partials/header.inc.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Admin Panel</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Home</li>
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
        <div class="col-lg-3 col-6">
          <div class="small-box bg-light">
            <div class="inner">
              <h3>4</h3>
              <p>Subscribed Emails</p>
            </div>
            <div class="icon">
              <i class="far fa-paper-plane"></i>
            </div>
            <a href="subscribedEmails.php" class="small-box-footer">
              Open <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- small card -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-light">
            <div class="inner">
              <h3>10</h3>
              <p>Subscribed Emails</p>
            </div>
            <div class="icon">
              <i class="far fa-envelope"></i>
            </div>
            <a href="inbox.php" class="small-box-footer">
              Open <i class="fas fa-arrow-circle-right"></i>
            </a>
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
include 'includes/partials/footer.inc.php';
?>