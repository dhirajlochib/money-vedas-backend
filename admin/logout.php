<?php
session_start();
unset($_SESSION["sess_id"]);
unset($_SESSION["my_id"]);
header("Location:login.php");
?>
