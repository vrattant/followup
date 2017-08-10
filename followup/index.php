
<?php 
require 'core.inc.php';
require 'connection.inc.php';
if(loggedin())
 {  
 echo '<body background=""></body>';
 $rightvar=$_SESSION['user_id'];
 //echo $rightvar;
 $result = mysqli_query($con,"SELECT * FROM employe_master WHERE id = '$rightvar'") or die(mysqli_error($con));  
               $data = mysqli_fetch_array($result);  
   $firstname=$data['firstname'];
   $surname=$data['surname'];
   $userid=$data['id'];
   $last_log = $data['last_login'];
   $proj=$data['project_code'];
    
   ?> 
   <body>
<link rel="stylesheet" href="css/img_txt.css">   
<div class="clearfix float-my-children">
<img src="images/hcl.jpg" width="157" height="95" alt="hcl" longdesc="hcl.jpg" />
 
<div></b></div>
</div>
<?php
 $projinfo = mysqli_query($con,"SELECT * FROM project_master WHERE project_code = '$proj'") or die(mysqli_error($con));  
               $data1 = mysqli_fetch_array($projinfo); 
			   $projname=$data1['project_name'];
			   $projectdead=$data1['project_deadline'];
			   $projstatus=$data1['project_status'];
			   $projdesc=$data1['project_desc'];
			   $projstart=$data1['project_start'];
			   


			   
?>
<b style="font-size:12px ; margin-left:27cm ;"><?php echo $firstname." ".$surname ?><br><br>
<b style="margin-left:27cm; font-size:12px">Last Login: <?php echo $last_log ?></b><br>
<b>Project Code :<?php echo $proj ?></b> 
<?php $result1 = mysqli_query($con,"select * from tasks_$proj where assignedto = '$userid' and status!='COMPLETE'");
$num = mysqli_num_rows($result1);
$result2 = mysqli_query($con,"select * from tasks_$proj where assignedby = '$userid' and status='EXT_REQ'");
$num2 = mysqli_num_rows($result2);

if($num==0 && $num2==0){
	echo '<br><marquee style="color:#F00">No Pending Tasks for you</marquee><br><br><br><br>';
	}
else if($num !=0 && $num2==0){
	echo '<br><marquee style="color:#F00">You have '.$num.' pending task(s) to complete.</marquee><br><br><br><br>';
	}
else if($num==0 && $num2 !=0){
	echo '<br><marquee style="color:#F00"> '.$num2.' task(s) requested for extension.</marquee><br><br><br><br>';
	}
else {
	echo '<br><marquee style="color:#F00">You have '.$num.' pending task(s) to complete & '.$num2.' task(s) requested for extension</marquee><br><br><br><br>'; 
	}	
	
	 ?> 

<link rel="stylesheet" href="css/w3.css">
<body>

<div class="w3-bar w3-blue">
  <button class="w3-bar-item w3-button tablink" onClick="openLink(event, 'proj')">Project Details</button>
  <button class="w3-bar-item w3-button tablink" onClick="openLink(event, 'team')">Project Team</button>
  <button class="w3-bar-item w3-button tablink" onClick="openLink(event, 'mytask')">My Tasks</button>
  <button class="w3-bar-item w3-button tablink" onClick="openLink(event, 'assign')">Assign a New Task</button>
  <button class="w3-bar-item w3-button tablink" onClick="openLink(event, 'byme')">Tasks Assigned by me</button>
  <button class="w3-bar-item w3-button tablink" onClick="openLink(event, 'cal')">Calender</button>
  <button class="w3-bar-item w3-button tablink" onClick="openLink(event, 'docs')">Project Documents</button>
  <a  href="logout.php"><button class="w3-bar-item w3-button tablink">Logout</button></a>
</div>
<div style="margin-left:150px">
  

  <div id="proj" class="w3-container city w3-animate-opacity" style="display:none; margin-top:2cm">
    <h4><u><b>Project: </b><?php echo $projname ?></u></h4><br /><br />
    <p><b>Project Code: </b><?php echo $proj ?> <br /><br />
    <b>Project Description: </b><?php echo $projdesc?> <br /><br />
    <b>Project Deadline: </b><?php echo $projectdead?><br /><br />
    <b>Project Start Date:</b> <?php echo $projstart?><br /><br />
    <b>Project Phase: </b><?php echo $projstatus?><br /><br />
    
    </p>
  </div>

  <div id="team" class="w3-container city w3-animate-opacity" style="display:none; margin-top:2cm">
    
    <?php
	require 'team.php';
?>
	
  </div>
  <div id="mytask" class="w3-container city w3-animate-right" style="display:none; margin-top:2cm">
    <?php 
	require 'mytask.php'; 
	
	?>
  </div>

  <div id="assign" class="w3-container city w3-animate-right" style="display:none; margin-top:2cm">
   <?php 
	require 'newTask.php'; 
	?>
  </div>

  

  <div id="byme" class="w3-container city w3-animate-bottom" style="display:none; margin-top:2cm">
    <?php require 'taskByMe.php';
	?>
  </div>

  <div id="cal" class="w3-container city w3-animate-zoom" style="display:none; margin-top:2cm">
   <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=vrattantarora%40gmail.com&amp;color=%231B887A&amp;ctz=Asia%2FCalcutta" style="border-width:0" width="1000" height="300" frameborder="0" scrolling="no"></iframe>
  </div>
  <div id="docs" class="w3-container city w3-animate-bottom-zoom" style="display:none; margin-top:2cm">
   <a href="docs/srs osc.pdf" target="_blank"> Project SRS</a><br><br>
   <a href="docs/COST_BASELINE.xlsx"target="_blank"> Cost Baseline</a><br><br>
   <a href="docs/322dfc00-db0e-4d1a-83f5-dc7199f5db44.png" target="_blank"> Swimlane</a><br><br>
   <a href="docs/class diagram.PNG" target="_blank"> Class Diagram</a><br><br>
  </div>

</div>

<script>
function openLink(evt, animName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(animName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>

</body>
<style>


#open{
	margin:8cm
	}
</style>
 <?php }
  
else
{

include 'login.inc.php';


}
?>