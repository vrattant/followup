

<?php
require 'connection.inc.php';
$taskcode =isset($_POST['id'])?$_POST['id']:'not yet';
$proj =isset($_POST['id1'])?$_POST['id1']:'not yet';
//echo $proj;
mysqli_query($con, "update tasks_$proj set status = 'COMPLETE' where taskcode='$taskcode'");
$sql = "SELECT * FROM tasks_$proj where taskcode='$taskcode'";
$result = mysqli_query($con,$sql)or die(mysqli_error());
$row = mysqli_fetch_array($result);
$assignedby = $row['assignedby'];
$assignedto = $row['assignedto'];
$taskname=$row['taskname'];
$getname=mysqli_query($con,"SELECT * FROM employe_master where id='$assignedto'")or die(mysqli_error());
$row2 = mysqli_fetch_array($getname);
$fname=$row2['firstname'];
$sname=$row2['surname'];
$getmail=mysqli_query($con,"SELECT * FROM employe_master where id='$assignedby'")or die(mysqli_error());
$row1 = mysqli_fetch_array($getmail);
$fname1=$row1['firstname'];
$sname1=$row1['surname'];
$mailid=$row1['email'];
mail($mailid,'Task '.$taskcode.' Completion','Hello Mr. '.$fname1.' '.$sname1.' your task assigned to Mr. '.$fname.' '.$sname.' for '.$taskname.' has been completed. Kindly verify the same and update accordingly 




Regards
Admin
Followup Tracker' ,'From: followuptracker@hcl.com');


?>