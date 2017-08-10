<?php
require 'connection.inc.php';
$eid =isset($_POST['eid'])?$_POST['eid']:'not yet';
$pass=isset($_POST['pass'])?$_POST['pass']:'not yet';
$proj=isset($_POST['proj'])?$_POST['proj']:'not yet';
$verifypass=mysqli_query($con,"SELECT * FROM employe_master where id='$eid' and password='$pass'")or die(mysqli_error());
$rowpass = mysqli_num_rows($verifypass);
$verify=mysqli_query($con,"SELECT * FROM reg_followup where status = 0 and project_code = '$proj'")or die(mysqli_error());
$row = mysqli_num_rows($verify);
//echo $row;
if($row == 1 && $rowpass==1){
echo '<script language="javascript">';
echo 'alert("Project Sucessfully Registered")';
echo '</script>';
echo '<script language="javascript">';
echo 'location.href = "newReg.php"';
echo '</script>';
mysqli_query($con, "update reg_followup set status = '1' where project_code = '$proj'");
	mysqli_query($con, "update employe_master set followup_status = '1' where project_code = '$proj'");
	
	mysqli_query($con, "CREATE TABLE tasks_$proj (
  sno int(11) NOT NULL,
  taskcode varchar(10) NOT NULL,
  taskname varchar(25) NOT NULL,
  taskdesc varchar(200) NOT NULL,
  assignedto varchar(30) NOT NULL,
  assignedby varchar(30) NOT NULL,
  assignedon varchar(20) NOT NULL,
  completiondate varchar(20) NOT NULL,
  status varchar(20) NOT NULL DEFAULT 'INCOMPLETE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1");
}
else{
	echo '<script language="javascript">';
echo 'alert("Invalid details or project already registered")';
echo '</script>';
echo '<script language="javascript">';
echo 'location.href = "newReg.php"';
echo '</script>';
	}
?>