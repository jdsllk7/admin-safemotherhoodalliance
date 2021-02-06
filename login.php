<?php
if (!isset($_SESSION)) {
  session_start();
}
include_once 'includes/class-autoLoader.inc.php';
if (isset($_SESSION["login"])) {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    Admin-Login | Safe Motherhood Alliance
    <?php
    $db = new DB();
    echo ' [' . $db->server() . ']';
    ?>
  </title>
  <!-- <link rel="shortcut icon" type="image/x-icon" href="dist/img/logo/pink-mom-baby-logo-circle-white-background.png" /> -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="text-center mt-3">
        <img src="dist/img/logo/pink-mom-baby-logo-with-large-label-right.png" class="m-0 p-2" alt="logo" width="200" height="80">
      </div>

      <div class="card-body login-card-body mb-3">

        <form id="adminLoginForm">
          <pre class="login-box-msg feedbackMsg">Welcome Boss<br>Please login to get started</pre>
          <label>Email</label><br>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <label>Password</label><br>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block p-3">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/ajaxCallFormSubmit.js"></script>
  <script src="dist/js/adminLogin.js"></script>
</body>

</html>