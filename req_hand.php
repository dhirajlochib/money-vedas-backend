<?php

require("res/build_con.php");
require("res/fun.php");




if (isset($_REQUEST['register_btn'])) {


  $sps_id = mysqli_real_escape_string($conn, $_REQUEST['sps_id']);
  $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
  $user_mob = mysqli_real_escape_string($conn, $_REQUEST['user_mob']);
  $user_pass = mysqli_real_escape_string($conn, $_REQUEST['user_pass']);

  if ($sps_id == '') {

    $sps_id = 801526;
  }
  $_SESSION['error'] = 'SPS';
  if (check_sponser_id($sps_id)) {
    $_SESSION['error'] = 'Mobile';
    if (check_mobile($user_mob)) {
      $_SESSION['ERROR'] = 'N';
      $password = password_hash($user_pass, PASSWORD_BCRYPT);
      $agent_id = substr(str_shuffle("0123456789"), 0, 6);
      $regdate =  date("Y-m-d H:i:s");

      $d = mysqli_query($conn, "INSERT INTO `agent`(`sponser_id`, `agent_id`, `agent_name`, `password`, `agent_mob`, `reg_date`) VALUES ('$sps_id', '$agent_id', '$username', '$password', '$user_mob', '$regdate')");
      $t = mysqli_query($conn, "INSERT INTO `agent_income`(`agent_id`) VALUES ('$agent_id')");
      if ($d) {

        $_SESSION['reg'] = true;
        $_SESSION['agent_id'] = $agent_id;
        $_SESSION['Name'] = $username;
      }
    }
  }
  header("location: login.php");
}



if (isset($_REQUEST['login_btn'])) {


  $agent_id = mysqli_real_escape_string($conn, $_REQUEST['agent_id']);
  $agent_pass = mysqli_real_escape_string($conn, $_REQUEST['agent_pass']);
  $data = mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$agent_id' or `agent_mob`='$agent_id'"); 


  if (mysqli_num_rows($data) > 0) {

    $data = mysqli_fetch_array($data);
    $hash_pass = $data['password'];
    if (password_verify($agent_pass, $hash_pass)) {
      $_SESSION['sess_id'] = session_id();
      $_SESSION['my_id'] = $data['agent_id'];
      $_SESSION['mobile'] = $user_mob;
      $date = date("Y-m-d H:i:s");
      $ipaddress = get_client_ip();
      $addEntryInDB = mysqli_query($conn, "INSERT INTO `login_history`(`agent_id`, `ip_address`, `login_time`) VALUES ('$agent_id','$ipaddress','$date')");
     
        header('Location: dashbord.php');
      

    } else {
      $_SESSION['errror'] = "not_found";
    }
  } else {
    $_SESSION['errror'] = "not_found";
  }

  header('Location: dashbord.php');
}


if (isset($_REQUEST['activate_btn'])) {


  $user = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
  $pin = mysqli_real_escape_string($conn, $_REQUEST['pin']);

  if (check_valid_user_id($user)) {
    if (check_user_active_or_not($user)) {
      if (check_pin_valid_or_not($pin)) {
        $timestamp = date("Y-m-d H:i:s");
        mysqli_query($conn, "UPDATE `agent` SET `status`='1', `activation_date`='$timestamp' WHERE `agent_id`='$user'");
        leve_income_distrubute($user);
        mysqli_query($conn, "UPDATE `pins` SET `pin_status`='1', `used_date`='$timestamp' WHERE `pin_value`='$pin'");
        $_SESSION['status'] = 4;
      } else {
        $_SESSION['status'] = 3;
      }
    } else {
      $_SESSION['status'] = 2;
    }
  } else {
    $_SESSION['status'] = 1;
  }

  header("Location:activation.php");
}




if (isset($_REQUEST['update_info_btn'])) {

  $agent_id = mysqli_real_escape_string($conn, $_REQUEST['agent_id']);
  $agent_name = mysqli_real_escape_string($conn, $_REQUEST['newname']);
  $pay_name = mysqli_real_escape_string($conn, $_REQUEST['pay_name']);
  $pay_num = mysqli_real_escape_string($conn, $_REQUEST['pay_num']);

  $addres = mysqli_real_escape_string($conn, $_REQUEST['addres']);

  $timestamp = date('Y.m.d H:i:s');

  $data = mysqli_query($conn, "UPDATE `agent` SET `addres`='$addres', `agent_name`='$agent_name', `pay_name`='$pay_name', `update_info`='$timestamp' , `pay_number`='$pay_num' WHERE `agent_id`='$agent_id'");
  header("location: profile.php");
}





if (isset($_REQUEST['withdrawl_btn'])) {

  $agent_id = mysqli_real_escape_string($conn, $_REQUEST['agent_id']);
  $amt = mysqli_real_escape_string($conn, $_REQUEST['amount']);

  $amount = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent_income` WHERE `agent_id`='$agent_id'"));
  $_SESSION['status'] = 0;
  if ($amount['wallet'] >= $amt) {


    $time = date("Y-m-d H:i:s");
    mysqli_query($conn, "UPDATE `agent_income` SET `wallet`=`wallet` -$amt WHERE `agent_id`='$agent_id'");
    mysqli_query($conn, "INSERT INTO `wallet_history`(`agent_id`, `amt`, `desp`, `status`)VALUES ('$agent_id','$amt','Withdrawl', '1')");
    mysqli_query($conn, "INSERT INTO `withdrawl_history`(`agent_id`, `amount`, `request_time`) VALUES ('$agent_id','$amt', '$time')");
    $_SESSION['status'] = 4;
  }
  header("location: withdrawal.php");
}



if (isset($_REQUEST['transfer_btn'])) {

  $agent_id = mysqli_real_escape_string($conn, $_REQUEST['agent_id']);
  $r_id = mysqli_real_escape_string($conn, $_REQUEST['recive_id']);
  $amt = mysqli_real_escape_string($conn, $_REQUEST['amount']);
  $u_pass = mysqli_real_escape_string($conn, $_REQUEST['password']);

  $amount = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent_income` WHERE `agent_id`='$agent_id'"));
  $_SESSION['w_pass'] = 0;
  $dataa = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$agent_id'"));
  $hash_pass = $dataa['password'];

  if (check_valid_user_id($r_id)) {

    if (password_verify($u_pass, $hash_pass)) {
      if ($amount['wallet'] >= $amt) {


        $time = date("Y-m-d H:i:s");
        mysqli_query($conn, "UPDATE `agent_income` SET `wallet`=`wallet` -$amt WHERE `agent_id`='$agent_id'");
        mysqli_query($conn, "UPDATE `agent_income` SET `wallet`=`wallet` +$amt WHERE `agent_id`='$r_id'");
        mysqli_query($conn, "INSERT INTO `wallet_history`(`agent_id`, `amt`, `desp`, `status`)VALUES ('$r_id','$amt','Fund Recived', '1')");
        mysqli_query($conn, "INSERT INTO `wallet_history`(`agent_id`, `amt`, `desp`, `status`)VALUES ('$agent_id','$amt','Fund Transfered', '1')");

        $_SESSION['w_pass'] = 4;
      }
    } else {
      $_SESSION['w_pass'] = 1;
    }
  } else {
    $_SESSION['w_pass'] = 6;
  }
  header("location: transfer_fund.php");
}








if (isset($_REQUEST['change_pass_btn'])) {

  $agent_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
  $pass = mysqli_real_escape_string($conn, $_REQUEST['new_pass']);
  $c_pass = mysqli_real_escape_string($conn, $_REQUEST['c_pass']);


  if ($pass == $c_pass) {
    $password = password_hash($pass, PASSWORD_BCRYPT);

    $data = mysqli_query($conn, "UPDATE `agent` SET `password`='$password' WHERE `agent_id`='$agent_id'");
    $_SESSION['pass_ok'] = true;
    $sql = mysqli_query($conn, "UPDATE `mobile_numbers` SET `verified`= '1' WHERE 'agent_id' = '$agent_id'");
    header("location: logout.php");
  } else {
    $_SESSION['error_pass'] = 1;
    header("location: change_pass.php");
  }
}





if (isset($_REQUEST['change_old_pass'])) {
  $agent_id = mysqli_real_escape_string($conn, $_REQUEST['agent_id']);
  $old_password = mysqli_real_escape_string($conn, $_REQUEST['old_password']);
  $pass = mysqli_real_escape_string($conn, $_REQUEST['new_password']);
  $c_pass = mysqli_real_escape_string($conn, $_REQUEST['confirm_password']);
  $data = mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$agent_id'");
  $data = mysqli_fetch_array($data);
  $hash_pass = $data['password'];
  if (password_verify($old_password, $hash_pass)) {



    if ($pass == $c_pass) {

      $password = password_hash($pass, PASSWORD_BCRYPT);

      $data = mysqli_query($conn, "UPDATE `agent` SET `password`='$password' WHERE `agent_id`='$agent_id'");
      $_SESSION['pass_ok'] = true;
      header("location: logout.php");
    } else {
      $_SESSION['error_pass'] = 33;
      header("location: change_password.php");
    }
  } else {
    $_SESSION['error_pass'] = 11;
    header("location: change_password.php");
  }
}
