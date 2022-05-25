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
    require_once("pages/nav_or_side.php")
    ?>





    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add & Cut Fund - DBSERVICES</h1>
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
            <div class="col-md-6">
              <!-- general form elements -->

              <?php if (isset($_SESSION['w_pass'])) {

                if ($_SESSION['w_pass'] == 1) {
              ?>
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Great!</h5>
                    <?php
                    echo  "Balance deducted Successfully!";
                    ?>
                  </div>
                <?php
                } else if ($_SESSION['w_pass'] == 22) {
                ?>
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5>Great!</h5>
                    <?php
                    echo  "Balance Added Successfully!";
                    ?>

                  </div>
                <?php
                } elseif ($_SESSION['w_pass'] == 2) {
                ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    <?php
                    echo  "Something Went Wrong!";
                    ?>
                  </div>
                <?php
                } elseif ($_SESSION['w_pass'] == 8) {
                ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    <?php
                    echo  "Amount Must Be Smaller Than Your Balance!";
                    ?>
                  </div>
                <?php
                } elseif ($_SESSION['w_pass'] == 4) {
                ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    <?php
                    echo  "Please Enter Correct Agent Id!";
                    ?>
                  </div>
                <?php
                } elseif ($_SESSION['w_pass'] == 15) {
                ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    <?php
                    echo  "Agent Does Not Have Enough Balance!";
                    ?>
                  </div>
              <?php
                }
                unset($_SESSION['w_pass']);
              }
              ?>

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Or Cut Amount</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="req_hand.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="uname">User ID</label>

                      <input type="text" class="form-control" name="agent_id" id="exampleInputEmail1" value="<?php echo $my_id; ?>" hidden>
                      <input type="text" class="form-control" name="recive_id" id="exampleInputEmail1" placeholder="Enter Reciver's User Id">
                    </div>

                    <div class="form-group">
                      <label for="bal">Cut Or Add</label>
                      <select name="options" class="form-control">
                        <option name="opt_less" value="cut">Cut</option>
                        <option name="opt_add" value="add">Add</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="pin">Amount</label>
                      <input type="number" class="form-control" name="amount" id="exampleInputPassword1" placeholder="Amount">
                    </div>

                    <div class="form-group">
                      <label for="bal">Your Available Balance</label>
                      <?php $availableBal = mysqli_fetch_array(mysqli_query($conn, "SELECT `balance` FROM `admin` WHERE `admin_id` = '$my_id'")) ?>

                      <input type="text" class="form-control" value="<?php echo $availableBal['balance'] ?>" name="password" placeholder="Your Available Balance" readonly>
                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" name="cut_add_btn" class="btn btn-primary">Transfer Fund</button>
                    </div>
                </form>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!--/. container-fluid -->
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