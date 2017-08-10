<?php
require 'connection.inc.php';
$taskcode =isset($_POST['id'])?$_POST['id']:'not yet';
$proj =isset($_POST['id1'])?$_POST['id1']:'not yet';
$sql = "SELECT * FROM tasks_$proj where taskcode = '$taskcode'";
$result = mysqli_query($con,$sql)or die(mysqli_error());
$row = mysqli_fetch_array($result);
$currentdate=$row['completiondate'];
date_default_timezone_set('Asia/Calcutta');
$datever = date('Y-m-d', time());
$status=$row['status'];
?>
<div id="div2">
<p style="margin-left:4cm">
<b>Assigned On :</b> <?php echo $row['assignedon']; ?><br />
<b>Task Description :</b> <?php echo $row['taskdesc']; ?><br />
<b>Status :</b> <?php echo $row['status']; ?></p>
<input type="button" value="hide" style="margin-left:14cm" id="b2" /> <br /><br />
<div style="margin-left:-1cm">
<?php

if($row['status'] == "EXT_REQ"){
	echo '<div style="margin-left:12cm" ><input type="button" value="Extend Date"id="b3" />&nbsp&nbsp&nbsp;OR&nbsp&nbsp&nbsp  <input type="button" value="deny extension" id="b5" onclick="deny()" /></div> ';
	}
if($row['status'] == "COMPLETE"){
	echo '<input type="button" value="re-assign" style="margin-left:14.5cm" id="b4" /><br /><br />';
	}	
?>

<div style="display:none" id="datediv">
<p style="margin-left:12cm"><b>New Deadline: </b><input type="date" id="newDate" /></p>
<input type="button" style="margin-left:14.5cm" id="b4" onclick="changeDate()"  value="submit"/>
</div>
</div>
</div>
<div id="abc"></div>
<script src="script/ajax.js"></script>
<script>
	$("#b4").click(function(){
		$("#datediv").show();
		})
	$("#b3").click(function(){
		$("#datediv").show();
		})
    $("#b2").click(function(){
		$("#div2").hide();
		})
</script>
<script type="text/javascript">

function changeDate(){
	var status='<?php echo $status ?>';
	var deadline='<?php echo $currentdate ?>'; 
	var today = '<?php echo $datever?>';
	var x=document.getElementById("newDate").value;
	var e= Date.parse(deadline);
	var f = Date.parse(today);
	var g= Date.parse(x);
	if(x==""){
		alert("input new Dead Line");
		return false;
		}
	
	if(status=="COMPLETE" && g<f){
			alert("Assigned date must be greater than or equal to today's date");
			return false;
		}
	if(status=="EXT_REQ" && (g<f || g<e)){
			alert("New deadline must be greater than today's date and previous deadline");
			return false;
		}			
	else{
		$.ajax({
			type: "post",
			url: "taskByMeAuxExt.php",
			data: {id: '<?php echo $taskcode ?>', id1: '<?php echo $proj ?>',id2: x },
			cache:false,
			success: function(html){
			 $('#abc').html(html);
			 }
			});	
			window.alert("Response Submitted successfully");	
       		location.reload();
			
	}
			
	
}
function deny(){
		$.ajax({
			type: "post",
			url: "taskByMeAuxExt.php",
			data: {id: '<?php echo $taskcode ?>', id1: '<?php echo $proj ?>'},
			cache:false,
			success: function(html){
			 $('#abc').html(html);
			 }
			});	
			window.alert("Response Submitted successfully");	
       		location.reload();
			
	return false;
}
function extension(){
	
	var x= document.getElementById("check");
	$.ajax({
			type: "post",
			url: "taskByMeAuxExt.php",
			data: {id: '<?php echo $taskcode ?>', id1: '<?php echo $proj ?>' },
			cache:false,
			success: function(html){
			 $('#id').html(html);
			 }
			});	
			window.alert("Extension Requested");	
       		location.reload();
			
	return false;
}

</script>