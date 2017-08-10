<?php
require 'connection.inc.php';
$eid =isset($_POST['eid'])?$_POST['eid']:'not yet';
$pass=isset($_POST['pass'])?$_POST['pass']:'not yet';
$verifypass=mysqli_query($con,"SELECT * FROM employe_master where id='$eid' and password='$pass' and followup_status=0")or die(mysqli_error());
$rowpass = mysqli_num_rows($verifypass);
if($rowpass==1){
	mysqli_query($con, "update employe_master set followup_status = '1' where id = '$eid'");
	echo '<script language="javascript">';
echo 'alert("Employee Registration for followup-Tracker successful")';
echo '</script>';
echo '<script language="javascript">';
echo 'window.close()';
echo '</script>';
	}
else{
	echo '<script language="javascript">';
echo 'alert("Invalid Employee ID/password or Employee already registered")';
echo '</script>';
echo '<script language="javascript">';
echo 'window.close()';
echo '</script>';
	}

?>