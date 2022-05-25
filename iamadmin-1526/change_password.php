

<?php

require("res/build_con.php");
require("res/check_login.php");
?>



<?php  
if (isset($_SESSION['error_pass'])) {
  
  ?>
  <div class="alert alert-danger">
    <?php
  if ($_SESSION['error_pass']==11)
  {
    echo "Password Not Match With Our Record Please Try Again!!";
  }
  else if ($_SESSION['error_pass']==33)
  {
    echo "Password Not Match Please Check!!";
  }
 
?>

</div>

<?php
}

unset($_SESSION['error_pass']);
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forget Password Money vedas</title>

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
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="dashbord.php" class="h1"><b>MONEY </b>vedas</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Change your password? Here you can easily change your password.</p>
      <form action="req_hand.php" method="post">
        <div class="input-group mb-3">
          <input type="password" name="old_password" class="form-control" placeholder="Old Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
        <?php $bal = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$my_id'"));?>
        <input type="text" name="agent_id" value="<?php echo $my_id; ?>" class="form-control" hidden >
        <div class="input-group mb-3">
          <input type="password" name="new_password" class="form-control" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div><div class="input-group mb-3">
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" name="change_old_pass" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="forget-pass.php">Forget PassWord?</a>
      </p>
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
</body>
</html>
