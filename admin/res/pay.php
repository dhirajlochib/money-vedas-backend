<?php
session_start();

require("../inmo/src/Instamojo.php");
require("cred.php");

$api = new Instamojo\Instamojo(API_KEY, AUTH_TOKEN, 'https://www.instamojo.com/api/1.1/');


$amount = '250';
$email = $_POST["email"];
$agent_id = $_POST["agent_id"];
$purpose = $_POST["purpose"];
$agent_mob = $_POST["agent_mob"];

$_SESSION["amount"]=$amount;
$_SESSION["email"]=$email;
$_SESSION["agent_id"]=$agent_id;
$_SESSION["agent_mob"]=$agent_mob;

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "buyer_name" => $agent_id,
        "amount" => $amount,
        "phone" => $agent_mob,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        "redirect_url" => "http://moneyvedas.tech/res/successpay.php"
        ));
        
        $pay_ulr = $response['longurl'];
  


  header("Location: $pay_ulr");
        echo("<pre>");
    print_r($response);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}







 ?>
