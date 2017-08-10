

<?php
session_start();
require 'core.inc.php';
require 'connection.inc.php';
$id=$_SESSION['user_id'];
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d h:i:s', time());
mysqli_query($con, "update employe_master set last_login = '$date' where id = '$id'");
session_destroy();
header('Location: '.$http_referer);
 
 
?>
