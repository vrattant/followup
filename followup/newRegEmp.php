<?php
require "connection.inc.php";?>
<h1 align="center"><u>New Registration</u></h1>
<div style="margin-left:4cm">
Employee ID: <input type="text" id="eid" /><br /><br />
Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;<input type="password" id="pass" /><br /><br />
<input type="button" onclick="submit_details()" id="b1" style="margin-left:3cm" value="submit" />
</div>
<div id="ab"></div>
<script src="script/ajax.js"></script>
<script type="text/javascript">
function submit_details(){
	var a=document.getElementById("eid").value;
	var b=document.getElementById("pass").value;
	if(a==""){
		alert("Enter Employee ID");
		return false;
		}
	if(b==""){
		alert("Input your Password");
		return false;
		}	
	 if (confirm("Click OK register") == true){	
	$.ajax({
			type: "post",
			url: "newRegEmpAux.php",
			data: {eid: a ,pass: b},
			cache:false,
			success: function(html){
			 $('#ab').html(html);
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
