<?php
if (isset($_SESSION['sess_id']) && isset($_SESSION['my_id'])) {
    $my_id = $_SESSION['my_id'];
} else {

    header("location:login.php");
}
