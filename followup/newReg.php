<?php
require "connection.inc.php";
$sql = "SELECT * FROM employe_master where designation = 'Project Manager'";
$aResult = mysqli_query($con,$sql);
?>
<body bgcolor="#CCCCCC">
<h1 align="center"><u>New Project Registration</u></h1>
<div style="margin-left:10cm; margin-top:3cm">
<b>Employee ID: </b><select name="sid" id="sid" onChange="fun()">
<option value="">Select</option> 
<?php

while($rows=mysqli_fetch_array($aResult))
{
$eid  = $rows['id'];
$name = $rows['firstname']." ".$rows['surname'];
if($sid1 == $id)
{
$chkselect = 'selected';

}
else
{
$chkselect ='';
}
?>
<option value="<?php echo  $eid;?>"><?php echo $eid;?></option>
<?php } ?>
</select>
</div>
<br /><br />
<div id="data">

</div>
<script src="script/ajax.js"></script>
<script type="text/javascript">
function fun(){
	var x= document.getElementById("sid").value;
	$.ajax({
			type: "post",
			url: "NewRegAux.php",
			data: {id: x},
			cache:false,
			success: function(html){
			 $('#data').html(html);
			 }
			});
	
	}
</script>