


<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>REGISTER - Money vedas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <?php
  if (isset($_SESSION['error']) && !isset($_SESSION['reg'])){

    ?>
<div class="alert alert-danger">
  <?php
if ($_SESSION['error']=='SPS')
{
  echo "Sponser ID Not Valid!";
}
elseif ($_SESSION['error']=='Mobile')
{
echo "Mobile Number Is already Used!";
}
else
{
  echo "Somthing Went Wrong Try Again!";
}
?>



<?php
unset($_SESSION['error']);
unset($_SESSION['reg']);

}

  ?>
</div>




  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="dashbord.php" class="h1"><b>MONEY </b>vedas</a>
    </div>


    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="req_hand.php" method="post">
        <div class="input-group mb-3">
         <?php if (isset($_GET['spsid'])){
           $reg_id = $_GET['spsid'];
           $ip_address = get_client_ip();
           //add entry in db for this user
            $sql = "INSERT INTO `link_click`(`agent_id`, `click_date`, `ip_address`, ) VALUES ('$reg_id', NOW(), '$ip_address')";
            $result = mysqli_query($conn, $sql);
         }else{
          $reg_id = "";

         }?>
         
          <input type="text" name="sps_id" value="<?php echo $reg_id; ?>" class="form-control" placeholder="Sponser ID" pattern[0-9]{6}>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Full Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="user_mob" class="form-control" placeholder="Mobile Number" pattern="[6-9]{1}[0-9]{9}" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="user_pass" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required >
              <label for="agreeTerms">
               I agree to the <a href="terms.php">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="register_btn" class="btn btn-primary btn-block">SignUp</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
