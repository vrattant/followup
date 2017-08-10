<?php
require 'connection.inc.php';
$eid =isset($_POST['id'])?$_POST['id']:'not yet';
$sql = "SELECT * FROM employe_master where id = '$eid'";
$aResult = mysqli_query($con,$sql);
$rows=mysqli_fetch_array($aResult);
?>
<div style="margin-left:10cm">
<br /><b>Employee Name: </b><?php echo $rows['firstname']." ".$rows['surname'] ?><br /><br /><br />
<b>Password: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;</b><input type="password" id="pass" /><br /><br />
<b>Project Code: </b><input type="text" id="code"/><br /><br /><br>
<input type="button" onclick="submit_details()" id="b1" style="margin-left:3cm" value="submit" />
</div>
<div id="zx"></div>
<script>
function submit_details(){
	var a=document.getElementById("pass").value;
	var b=document.getElementById("code").value;
	if(a==""){
		alert("Enter Password");
		return false;
		}
	if(b==""){
		alert("Input your project code");
		return false;
		}	
	 if (confirm("Click OK register") == true){	
	$.ajax({
			type: "post",
			url: "newRegAuxSub.php",
			data: {eid:'<?php echo $eid ?>' ,pass: a,proj: b},
			cache:false,
			success: function(html){
			 $('#zx').html(html);
			 }
			});
			//alert("success12");
			//location.href = "newReg.php";
	 }
	else{
		//
		}		
	}
</script>



