
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
  <link rel="stylesheet" href="./css/tree.css">

<?php
require_once("pages/all_link.php")
?>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

 
 <?php
 require_once("pages/nav_or_side.php")
?>
 
 <style>
   .scrollable {
    overflow: scroll !important;
    height: 100vh !important;
    width: max-content !important;
    min-width: 100vw;
  }
 </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper container" style="margin-top: 8rem;" >
    <!-- Content Header (Page header) -->
    <div class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-3">Agent Tree</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="scrollable">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <?php
            $curr_user = $conn->query("SELECT * FROM `agent` WHERE `agent_id`='$my_id'");
            $curr_user = $curr_user->fetch_assoc();

            $data = $conn->query("SELECT * FROM `agent` WHERE `sponser_id`='$my_id'");
            $data = $data->fetch_assoc();

            $count = 0;
            function render_tree(string $agent_id, string $agent_name )
            {
              global $count;
              //syop at level six
              $count++;
                if($count % 8 == 0)
                              {
                                return;
                              }
              

             ?>
                <li>
                  <a href="#">
                    <img src="css\pics\user.png" />
                    <span>
                      <?php echo $agent_name ?>
                      <?php echo "(".$agent_id.")"; ?>
                    </span>
                  </a>
                  <ul>

                    <?php 
                      if($agent_id  ) {
                        
                        require("res/build_con.php");
                          $data = mysqli_query($conn, "SELECT * FROM `agent` WHERE `sponser_id`='$agent_id'");
                          while($agent = mysqli_fetch_array($data, MYSQLI_BOTH)) {
                            render_tree($agent["agent_id"], $agent["agent_name"] );
                          
                           

                          }
                      }
                        ?>
              </ul>
                </li>
              <?php
            }
            ?>
            <div class="container">
              <div class="row">
                <div class="tree">
                  
                      <!-- <a href="profile.php">
                        <img src="css\pics\user.png" />
                        <span>
                          <?php 
                          // echo $curr_user["agent_name"] ?>
                          <?php // echo "(".$curr_user['agent_id'].")"; ?>
                        </span>
                      </a> -->
                      <ul class="scrollable">
                        <?php 
                        
                        render_tree($curr_user["agent_id"], $curr_user["agent_name"]); 
                        
                        ?>
                    </ul>                   
                </div>
              <!-- </div> -->
            </div>
          <!-- </div> -->
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
