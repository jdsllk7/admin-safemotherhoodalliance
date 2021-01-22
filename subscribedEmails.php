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
          <h1 class="m-0 text-dark">Subscribed Email Addresses</h1>
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
        <div class="col-lg-12 col-12">
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">Subscribed Email Addresses</h3>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Email Address</th>
                    <th>Status</th>
                    <th>Date Subscribed</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="emailRow">
                    <td>1.</td>
                    <td>jdslk7@gmail.com</td>
                    <td>Active</td>
                    <td>20-01-2021</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-danger emailDeleteBtn">Delete</button>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Email Address</th>
                    <th>Status</th>
                    <th>Date Subscribed</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
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