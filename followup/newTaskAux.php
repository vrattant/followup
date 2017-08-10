<?php
require 'connection.inc.php';
$eid =isset($_POST['id'])?$_POST['id']:'not yet';
$proj =isset($_POST['id1'])?$_POST['id1']:'not yet';
$myid =isset($_POST['id2'])?$_POST['id2']:'not yet';
$sql1 = "SELECT * FROM $proj where id = '$eid'";
$result1 = mysqli_query($con,$sql1)or die(mysqli_error());
$row1 = mysqli_fetch_array($result1);
$sql = "SELECT * FROM employe_master where id = '$eid'";
$result = mysqli_query($con,$sql)or die(mysqli_error());
$row = mysqli_fetch_array($result);
date_default_timezone_set('Asia/Calcutta');
$role=$row1['designation'];
$today = date("Ymd");
$rand = strtoupper(substr(uniqid(sha1(time())),0,2));
if($role)
$taskcode=substr($role,0,3).'_'.$rand;
else
$taskcode="";

$datever = date('Y-m-d', time());
?>
<div id="newaux">
<form>
  <b>Employee ID:</b> 
    <?php echo $eid ?>
  &nbsp&nbsp&nbsp&nbsp;<b>Project Role: </b>
  <?php echo $role ?><br /><br />
  <b>Task Code:
   &nbsp
   &nbsp </b>
  <?php echo $taskcode ?>
   &nbsp&nbsp&nbsp&nbsp;<b>Task Name:
    </b>
   <input type="text" id="tname" placeholder="input task name"/>
  
  <br /><br />
    <b>Task Description:</b>            <br />
    <textarea rows="4" cols="34" id="desc"></textarea>
  <br /><br />
  <b>Task Deadline: </b><input type="date" id="compdate" /> 
<br /><br />
<b>Attachment: </b><input type="file" id="file" />
</form>
<input type="button" onclick="submit_details()" id="b1" style="margin-left:11cm" value="submit" />
</div>
<script>
function submit_details(){
	var a=document.getElementById("tname").value;
	var b=document.getElementById("desc").value;
	var c=document.getElementById("compdate").value;
	var d= '<?php echo $datever ?> ';
	var e= Date.parse(c);
	var f = Date.parse(d);
	if(a==""){
		alert("Enter Task Name");
		return false;
		}
	if(b==""){
		alert("Input Task Description");
		return false;
		}	
	if(c==""){
		alert("Enter Task Deadline");
		return false;
		}
	if(e < f){
		alert("Deadline Must be greater than or same as today's date");
		return false;
		}
	 if (confirm("Click OK to assign task") == true){	
	$.ajax({
			type: "post",
			url: "newTaskAuxSub.php",
			data: {tcode:'<?php echo $taskcode ?>' ,tname: a,desc: b,date: c,myid: '<?php echo $myid ?>',assignto: '<?php echo $eid ?>', proj: '<?php echo $proj ?>'},
			cache:false,
			success: function(html){
			 $('#aux').html(html);
			 }
			});
			alert("Task Assigned Successfully");
			location.reload();
	 }
	else{
		//
		}
	}
</script>
 	  
