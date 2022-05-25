<?php
if (isset($_SESSION['sess_id']) && isset($_SESSION['my_id']) ) {
    if($_SESSION['my_id'] == 80008091)
    {
    $my_id = $_SESSION['my_id'];
    }
    else
{

    header("location:login.php");

}
}
else
{

    header("location:login.php");

}



?>
