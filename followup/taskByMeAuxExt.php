<?php
require 'connection.inc.php';
$taskcode =isset($_POST['id'])?$_POST['id']:'not yet';
$proj =isset($_POST['id1'])?$_POST['id1']:'not yet';
$newdate =isset($_POST['id2'])?$_POST['id2']:'0';
$fetch=mysqli_query($con,"SELECT * FROM tasks_$proj where taskcode='$taskcode'")or die(mysqli_error());
$rfetch=mysqli_fetch_array($fetch);
$assignto = $rfetch['assignedto'];
$assignby=$rfetch['assignedby'];
$taskname=$rfetch['taskname'];
$getname=mysqli_query($con,"SELECT * FROM employe_master where id='$assignto'")or die(mysqli_error());
$row2 = mysqli_fetch_array($getname);
$mailid=$row2['email'];
$fname1=$row2['firstname'];
$sname1=$row2['surname'];
$getnameto=mysqli_query($con,"SELECT * FROM employe_master where id='$assignby'")or die(mysqli_error());
$row = mysqli_fetch_array($getnameto);
$fname=$row['firstname'];
$sname=$row['surname'];
if($newdate=='0'){
	mysqli_query($con, "update tasks_$proj set status = 'INCOMPLETE' where taskcode = '$taskcode'");

mail($mailid,'Task '.$taskcode.' Extension Denied','Hello Mr. '.$fname1.' '.$sname1.' deadline extension for the task '.$taskname.' has been denied by '.$fname.' '.$sname.'. Kindly verify the same with Follow-up tracker and update as required. 




Regards
Admin
Followup Tracker' ,'From: followuptracker@hcl.com');	
	}
else{	
$fetch12=mysqli_query($con,"SELECT * FROM tasks_$proj where taskcode='$taskcode'")or die(mysqli_error());
$rfetch12=mysqli_fetch_array($fetch12);

mysqli_query($con, "update tasks_$proj set completiondate = '$newdate', status = 'INCOMPLETE' where taskcode = '$taskcode'");
if($rfetch12['status'] == 'EXT_REQ'){
mail($mailid,'Task '.$taskcode.' Deadline Extension','Hello Mr. '.$fname1.' '.$sname1.' deadline for the task '.$taskname.' has been extended to '.$newdate.' by '.$fname.' '.$sname.'. Kindly verify the same with Follow-up tracker and update as required. 




Regards
Admin
Followup Tracker' ,'From: followuptracker@hcl.com');
}
else{
	mail($mailid,'Task '.$taskcode.' Re-Assigned','Hello Mr. '.$fname1.' '.$sname1.' task '.$taskname.' has been re-assigned to you by '.$fname.' '.$sname.', with the deadline '.$newdate.' .Kindly verify the same with Follow-up tracker and update as required. 




Regards
Admin
Followup Tracker' ,'From: followuptracker@hcl.com');
	}
}
?>