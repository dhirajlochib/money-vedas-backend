




<?php $bal = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `agent` WHERE `agent_id`='$my_id'"));

if ($bal['status'] == 0) {
  header("location: activate_account.php");
} ?>
