<?php

require("res/build_con.php");
require("res/check_otp.php");
require("res/fun.php");

if (isset($_REQUEST['send_otp_btn'])){
  $num = $_POST['user_mobile'];
  if(check_for_mobile($num)){
  

    $num = $_POST['user_mobile'];
  $data = mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_mob`='$num'");
    $agent_info = mysqli_fetch_array($data);
     $agent_id = $agent_info['agent_id'];
    


//SMS-API-INTROGRATION


$otp = mt_rand(10000,99999);
setcookie("otp",$otp);
$fields = array(
    "sender_id" => "TXTIND",
    "message" => "Hey, User ".$agent_id."This Is Your OTP:- ".$otp."-Team Money vedas",
    "route" => "v3",
    "numbers" => $num,
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: fX8UBNJ50r97lCx1MDptePILchkqFizORb4YvgVnW23GojmTKu4ygvWUYtcOVRJH1k9jzseMrxpZCX2n",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$_SESSION['ok']="ok";
$err = curl_error($curl);

curl_close($curl);


if($_SESSION['ok']){?> 
<div class="alert alert-success">
<?php

echo "Dear User ".$agent_id." ";
echo "OTP Sent Success!!";

unset($_SESSION['inmob']);

}
?>

</div>



<?php 

unset($_SESSION['ok']);
}

else {

  $_SESSION['inmob']=1;
header("Location: forget-pass.php");

}



}

if (isset($_REQUEST['verify_otp_btn'])){

$uotp = $_POST['user_otp'];

if($_COOKIE['otp']==$uotp){
  $num = $_POST['user_mobile'];
  $data = mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_mob`='$num'");
  $agent_info = mysqli_fetch_array($data);



  $agent_id = $agent_info['agent_id'];
  $_SESSION['getid'] = $agent_id;

  header("Location: change_pass.php");

}
else
{
?>
<div class="alert alert-danger">
<?php

echo "Invalid OTP Please Try Again!!";
}
?>

</div>

<?php

}


if (isset($_SESSION['error_pass'])) {
  
  ?>
  <div class="alert alert-danger">
    <?php
  if ($_SESSION['error_pass']==1)
  {
    echo "Password Not Match Please Try Again!!";
  }
 
?>

</div>

<?php
}


if (isset($_SESSION['inmob'])) {
  
  ?>
  <div class="alert alert-danger">
    <?php
  if ($_SESSION['inmob']==1)
  {
    echo "Mobile Number Not Found!!";
  }
  else
{
  echo "Somthing Went Wrong Try Again!";
}
?>

</div>

<?php

}




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
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form action="forget-pass.php" method="post">
        <div class="input-group mb-3">
        <input type="text" name="user_mobile" class="form-control" value="" placeholder="Mobile Number" pattern="[6-9]{1}[0-9]{9}" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="text" name="user_otp" class="form-control" placeholder="Enter OTP">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="send_otp_btn"  class="btn btn-primary btn-block">Get OTP</button>
            
            
            
             <button type="submit" name="verify_otp_btn" class="btn btn-primary btn-block">Change password</button> 
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
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
