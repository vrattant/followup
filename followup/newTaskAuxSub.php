<?php
require 'connection.inc.php';
$taskcode =isset($_POST['tcode'])?$_POST['tcode']:'not yet';
$taskname =isset($_POST['tname'])?$_POST['tname']:'not yet';
$taskdesc =isset($_POST['desc'])?$_POST['desc']:'not yet';
$deadline =isset($_POST['date'])?$_POST['date']:'not yet';
$assignby =isset($_POST['myid'])?$_POST['myid']:'not yet';
$assignto =isset($_POST['assignto'])?$_POST['assignto']:'not yet';
$proj =isset($_POST['proj'])?$_POST['proj']:'not yet';
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d', time());
$getname=mysqli_query($con,"SELECT * FROM employe_master where id='$assignto'")or die(mysqli_error());
$row2 = mysqli_fetch_array($getname);
$mailid=$row2['email'];
$fname1=$row2['firstname'];
$sname1=$row2['surname'];
$getnameto=mysqli_query($con,"SELECT * FROM employe_master where id='$assignby'")or die(mysqli_error());
$row = mysqli_fetch_array($getnameto);
$fname=$row['firstname'];
$sname=$row['surname'];
//echo "<h2>Task no. ".$taskcode." Assigned to ".$row2['firstname']." ".$row2['surname']." successfully</h2>" ;
mysqli_query($con, "insert into tasks_$proj(taskcode,taskname,taskdesc,assignedto,assignedby,assignedon,completiondate) values ('$taskcode','$taskname','$taskdesc','$assignto','$assignby','$date','$deadline')");
mail($mailid,'Task '.$taskcode.' Assigned','Hello Mr. '.$fname1.' '.$sname1.' you have been assigned a task by '.$fname.' '.$sname.' for '.$taskname.' with the deadline '.$deadline.'. Kindly verify the same with Follow-up tracker and update as required. 




Regards
Admin
Followup Tracker' ,'From: followuptracker@hcl.com');
?>