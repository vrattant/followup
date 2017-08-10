<?php 
$sql = "SELECT * FROM employe_master where project_code='$proj' and id != '$userid'";
$aResult = mysqli_query($con,$sql);
?>

<b>Assign Task to: </b><select name="sid" id="sid" onchange="fun()">
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
<option value="<?php echo  $eid;?>"><?php echo $name;?></option>
<?php } ?>
</select>
<br /><br />
<div id="aux">

</div>
<script src="script/ajax.js"></script>
<script type="text/javascript">
function fun(){
	var x= document.getElementById("sid").value;
	//alert(x);
	$.ajax({
			type: "post",
			url: "newTaskAux.php",
			data: {id: x,id1: '<?php echo $proj ?>', id2: '<?php echo $userid ?> '},
			cache:false,
			success: function(html){
			 $('#aux').html(html);
			 }
			});
	
	}
</script>