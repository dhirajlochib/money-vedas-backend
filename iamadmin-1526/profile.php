
<?php

require("res/build_con.php");
require("res/check_login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Money vedas | Dashboard </title>
<?php
require_once("pages/all_link.php")
?>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">


 <?php
 require_once("pages/nav_or_side.php");
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-3">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="img/user/user.png"
                       alt="User profile picture">
                </div>
  <?php $bal = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$my_id'"));?>
                <h3 class="profile-username text-center">Agent ID :- <?php echo $bal['agent_id'] ?></h3>

                <p class="text-muted text-center"><?php echo $bal['agent_name'] ?></p>

                <ul class="list-group list-group-unbordered mb-3">

      <li class="list-group-item">
                    <?php $bal = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent_income` WHERE `agent_id`='$my_id'"));?>
                    <b>Wallet Balance</b>
                    <a class="float-right"><b><?php echo $bal['wallet'] ?></b></h3></a>
                  </li>
                </ul>
                <a href="whatsapp://send?text=Hey, I Am Earning A Lot Of Money From Money vedas If You Have To Try Click On This Link:- http://moneyvedas.tech/register.php?spsid=<?php echo $my_id?>" class="btn btn-primary btn-block"><b>Invite Your Friend's</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>


          <div class="card-body" style="margin-top: -20px;"> 
            <p class="login-box-msg" style="font-size: 22px;">UPDATE YOUR PROFILE</p>
<?php $bal = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$my_id'"));?>
            <form action="req_hand.php" method="post">
            <label for="agent_id">Agent Id</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="agent_id" value="<?php echo $bal['agent_id'] ?>" readonly>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <label for="newname">Name</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="newname" value="<?php echo $bal['agent_name'] ?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <label for="mobile">Mobile</label>
              <div class="input-group mb-3">
                <input type="text" name="mobile" class="form-control" value="<?php echo $bal['agent_mob'] ?>" readonly >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
              <label for="addres">Address</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="addres" value="<?php echo $bal['addres'];  ?>" placeholder="Enter Your Address">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-home"></span>
                  </div>
                </div>
              </div>
              <label for="pay_num">PhonePe/PayTm Mobile Number</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="pay_num" value="<?php echo $bal['pay_number']; ?>" placeholder="PhonePe/PayTm Mobile Number">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <label for="pay_name">Name On PhonePe/PayTm</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="pay_name" value="<?php echo $bal['pay_name']; ?>" placeholder="Name On PhonePe/PayTm">
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
                     I agree to the <a href="#">terms</a>
                    </label>
                  </div>
                </div>
                <!-- /.col -->

                <div class="col-4">
                  <button type="submit" name="update_info_btn" class="btn btn-primary btn-block">Update</button>
                </div>

                <!-- /.col -->
              </div>
            </form>
            <div class="col-4">
              <a href="change_password.php"> <button name="update_info_btn" class="btn btn-primary btn-block">Change Password</button></a>
            </div>



          </div>
          <!-- /.form-box -->
          </div><!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <?php
    require_once("pages/footer.php")
    ?>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
