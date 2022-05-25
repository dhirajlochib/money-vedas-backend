
<?php

require("res/build_con.php");
require("res/check_login.php");
require("res/fun.php");
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
          <h1 class="m-3">Withdrawal Request</h1>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Request Time</th>
                      <th>Approve Date</th>
                      <th>Accepte</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php

if (isset($_GET['aid'])&&isset($_GET['a'])) {
  $a = $_GET['a'];
  $id = $_GET['aid'];
  if (check_withdrawal_status($id)) {
   
  
if ($a==1) {
  
  $timestamp = date('Y-m-d H:i:s');
  $d = mysqli_query($conn, "UPDATE `withdrawl_history` SET `status`=1, `approve_date`='$timestamp' WHERE `agent_id`='$id'");
  if ($d) {
    
    echo "<script type='text/javascript'>swal('Done!', 'Withdrawal Accepted Successfully!', 'success');</script>";
    
  }
}



}
else {
  
    
  echo "<script type='text/javascript'>swal('Opps!', 'Something Went Wrong!', 'error');</script>";

}
  }


                $direct_agent_list_query = mysqli_query($conn,"SELECT * FROM `withdrawl_history`  ORDER BY `sr_no` DESC ");
                $a=0;
                while ($data = mysqli_fetch_array($direct_agent_list_query)){
                ?>
                <tr>
                    <td><?php echo ++$a; ?> </td>
                    <td><?php echo $data['amount']; ?> </td>
                    <td><?php echo ($data['status'])?'Request Accepted':'Pending'; ?> </td>
                    <td><?php echo $data['request_time']; ?></td>

                    <td><?php echo ($data['status'])?$data['approve_date']:'Pending'; ?></td>
                    <td>
                    <?php echo ($data['status'])?'Aproved':"<a href='withdrawal_req.php?aid=$data[agent_id]&a=1' style='padding-left: 0px;padding-right: 0px;' class='btn btn-primary btn-block'><b>Accepte Widthrawal</b></a>";?>
                     
                        
                      </a>
                    </td>
                    



                </tr>

                <?php }?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
