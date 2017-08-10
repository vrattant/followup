<?php
require 'connection.inc.php';
$taskcode =isset($_POST['id'])?$_POST['id']:'not yet';
$proj =isset($_POST['id1'])?$_POST['id1']:'not yet';
$sql = "SELECT * FROM tasks_$proj where taskcode = '$taskcode'";
$result = mysqli_query($con,$sql)or die(mysqli_error());
$row = mysqli_fetch_array($result);
?>
<div id="div2">
<p style="margin-left:4cm">
<b>Assigned On :</b> <?php echo $row['assignedon']; ?><br />
<b>Task Description :</b> <?php echo $row['taskdesc']; ?><br />
<b>Status :</b> <?php echo $row['status']; ?></p>
<input type="button" value="hide" style="margin-left:14cm" id="b2" /> <br /><br />
<div style="margin-left:-1cm">
<?php
if($row['status'] == "INCOMPLETE"){ 
echo "<input type='checkbox' name='group1' value='COMPLETED' style='margin-left:13cm' id='check'> I have completed this task. <br><br />
<input type='button' onclick='complete()' value='submit' style='margin-left:15cm' id='b1' /> <br /><p style='margin-left:15.5cm'> OR </p>
<input type='button' onclick='extension()' value='Request Extension' style='margin-left:14cm' id='b1' />";
}
else if($row['status'] == "EXT_REQ"){
	echo "<input type='checkbox' name='group1' value='COMPLETED' style='margin-left:13cm' id='check'> I have completed this task. <br><br />
<input type='button' onclick='complete()' value='submit' style='margin-left:15cm' id='b1' /> <br /><p style='margin-left:15.5cm'>";
	}
?>
</div>
</div>
<script src="script/ajax.js"></script>
<script>
    $("#b2").click(function(){
		$("#div2").hide();
		})
</script>
<script type="text/javascript">

function complete(){
	var y=document.getElementsByName("group1");
	if(y[0].checked){
	var x= document.getElementById("check");
	$.ajax({
			type: "post",
			url: "mytaskAuxComplete.php",
			data: {id: '<?php echo $taskcode ?>', id1: '<?php echo $proj ?>' },
			cache:false,
			success: function(html){
			 $('#id').html(html);
			 }
			});	
			window.alert("Response Submitted successfully");	
       		location.reload();
			
	}
	

	else{
		alert("Tick the checkbox to confirm Completion");
	}
	
	return false;
}
function extension(){
	
	var x= document.getElementById("check");
	$.ajax({
			type: "post",
			url: "mytaskAuxExt.php",
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