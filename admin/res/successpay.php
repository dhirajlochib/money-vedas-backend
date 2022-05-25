<<?php
require("build_con.php");
require("fun.php");



require("../inmo/src/Instamojo.php");
require("cred.php");

$api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN, 'https://www.instamojo.com/api/1.1/');



try {
  $payment_request_id = $_GET['payment_request_id'];
  $payment_id = $_GET['payment_id'];

    $response = $api->paymentRequestPaymentStatus($payment_request_id,$payment_id);
// echo ("<pre>");
//  print_r($response);




$ststus = $response['status'];
$agent_id = $response['buyer_name'];

if (strcmp($ststus,'Completed')==0) {

leve_income_distrubute($agent_id);
$timestamp = date("Y-m-d H:i:s");
$d = mysqli_query($conn, "UPDATE `agent` SET `status`=1, `activation_date`='$timestamp' WHERE `agent_id`='$agent_id'");
if ($d) {
    
  header("Location: ../dashbord.php");
}



} else {

    echo ("Payment Failed, Please Try Again!!");
}

}

catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

 ?>
