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
          <h1 class="m-0 text-dark">Subscribed Email Addresses</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Subscribed Emails</li>
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
              <table id="example1" class="table table-hover table-bordered table-striped">
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

                  <?php
                  $subscribedEmails = new SubscribedEmails\SubscribedEmails();
                  $result = $subscribedEmails->getSubscribedEmails();
                  $count = 0;
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      //numbered display
                      $count++;

                      //display email status
                      $status = "";
                      if ($row["status"] == 1) {
                        $status = '<span class="badge badge-success">Active</span>';
                      }

                      //format date
                      $dateTime = new DateTime($row["emailSubscribeDate"]);
                      $formattedDate = $dateTime->format('d-m-Y | h:m A');
                      echo '
                    <tr class="emailRow' . $row["emailSubscribeId"] . '">
                      <td>' . $count . '.</td>
                      <td>' . $row["email"] . '</td>
                      <td>' . $status . '</td>
                      <td>' . $formattedDate . '</td>
                      <td>
                        <form class="emailDeleteForm">
                          <input type="hidden" name="emailId" value="' . $row["emailSubscribeId"] . '">
                          <button type="submit" title="Delete Email" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                    ';
                    }
                  } else {
                    echo '<p class="text-danger bold">No emails at the moment</p>';
                  }
                  ?>

                </tbody>
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
include_once 'includes/partials/footer.inc.php';
?>