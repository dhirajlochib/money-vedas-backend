<?php
  // session_start();
  

  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  $db_host = "localhost";
  $db_user = "u867765973_money_vedas";
  $db_pass = "1@Dhirajjat";
  $db_name = "u867765973_money_vedas";
  // $db_host = "localhost";
  // $db_user = "root";
  // $db_pass = "";
  // $db_name = "mlm";

  $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

  if (mysqli_connect_error()) {
    header('location:404.php');
  }

  date_default_timezone_set('Asia/Calcutta');
?>
