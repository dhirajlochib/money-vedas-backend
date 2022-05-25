<?php

function check_sponser_id($sps_id){
    global $conn;
    $data = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `agent` WHERE `agent_id`='$sps_id'"));

    if ($data == 1)
    {
        return true;
    }

    return false;

}





function check_mobile($user_mob){
    global $conn;
    $data = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `agent` WHERE `agent_mob`='$user_mob'"));

    if ($data == 1)
    {
        return false;
    }

    return true;

}

function check_valid_user_id($agent_id){
    global $conn;
    $data = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `agent` WHERE `agent_id`='$agent_id'"));

    if ($data == 1)
    {
        return true;
    }

    return false;

}

function check_user_active_or_not($agent_id){
    global $conn;
    $data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `agent` WHERE `agent_id`='$agent_id'"));

    if ($data['status'])
    {
        return false;
    }

    return true;

}

function check_withdrawal_status($agent_id){
  global $conn;
  $data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `withdrawl_history` WHERE `agent_id`='$agent_id'"));

  if ($data['status'])
  {
      return false;
  }

  return true;

}


function check_withdrawal_rej($agent_id){
  global $conn;
  $data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `withdrawl_history` WHERE `agent_id`='$agent_id'"));

  if ($data['rej'])
  {
      return false;
  }

  return true;

}



function check_pin_valid_or_not($pin){
    global $conn;

    $data = mysqli_query($conn,"SELECT * FROM `pins` WHERE `pin_value`='$pin'");

    if (mysqli_num_rows($data)==1)
    {
      $data = mysqli_fetch_array($data);
      if (!$data['pin_status']) {
        return true;
      }

    }
  return false;

}


function leve_income_distrubute($agent_id){
global $conn;

$sponser_id = get_spons_id($agent_id);
$a=1;
while ($a <= 6 && $sponser_id!=0) {
  $level = [100,80,60,40,20,10];
  $amt = $level[$a-1];
  mysqli_query($conn, "UPDATE `agent_income` SET `wallet`=`wallet`+$amt WHERE `agent_id`='$sponser_id'");
  mysqli_query($conn, "INSERT INTO `wallet_history`(`agent_id`, `amt`, `desp`, `status`)VALUES ('$sponser_id','$amt','Level Income', '0')");
  $sponser_id = get_spons_id($sponser_id);

  ++$a;
}

}

function get_spons_id($agent_id)
{
  global $conn;
  $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$agent_id'"));
  return $data['sponser_id'];
}




function check_for_mobile($user_mob){
  global $conn;
  $data = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `agent` WHERE `agent_mob`='$user_mob'"));

  if ($data == 1)
  {
      return true;
  }

  return false;

}


?>
