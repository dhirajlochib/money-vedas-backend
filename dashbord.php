
<?php

require("res/build_con.php");
require("res/check_login.php");
require("res/check_activate.php");
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
          <h1 class="m-3">Dashboard</h1>
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
        
        <?php 

$isVerified = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$my_id'"));?>
<?php if($isVerified['acc_number'] == "" || $isVerified['addres'] == ""){?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
              <h2>Earn More?</h2>

                <p>Complete Your Profile</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="profile.php" class="small-box-footer">
                Complete <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

  <?php }  ?>
<?php
        $agent_count_data = mysqli_fetch_array(mysqli_query($conn, "SELECT count(agent_id) total_agent FROM `agent` WHERE `sponser_id`='$my_id'"));

     ?>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $agent_count_data['total_agent'] ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="direct_agent_list.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php
        $agent_count_data = mysqli_fetch_array(mysqli_query($conn, "SELECT count(agent_id) total_agent FROM `agent` WHERE `sponser_id`='$my_id' AND `status`='1' "));

     ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $agent_count_data['total_agent'] ?></h3>

                <p>Total Active User</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="direct_agent_list.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>



          <?php
        $agent_count_data = mysqli_fetch_array(mysqli_query($conn, "SELECT count(agent_id) total_agent FROM `agent` WHERE `sponser_id`='$my_id' AND `status`='0' "));

     ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $agent_count_data['total_agent'] ?></h3>

                <p>Total Inactive User</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="direct_agent_list.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php $bal = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent_income` WHERE `agent_id`='$my_id'"));?>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?php echo $bal['wallet'] ?></h3>

                <p>Wallet Balance</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="income_history.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php
        $agent_count_data = mysqli_fetch_array(mysqli_query($conn, "SELECT count(agent_id) total_click FROM `link_click` WHERE `agent_id`='$my_id'"));

     ?>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $agent_count_data['total_click'] ?></h3>

                <p>Total Link Click's</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="whatsapp://send?text=Hey, I Am Earning A Lot Of Money From Money vedas If You Have To Try Click On This Link:- http://moneyvedas.tech/register.php?spsid=<?php echo $my_id?>" class="small-box-footer">
                Share Your Link <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
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
