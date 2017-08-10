
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>follow-up</title>
     <script src="js/index1.js"></script>
    <link rel="shortcut icon" href="images/hcl.jpg" />
    <link rel="stylesheet" href="css/normalize1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(css/img_txt.css);


body { 
	margin: 0px auto;
	margin-left:0;
	margin-bottom:0;
	width: 1336px;
	font-family: 'Open Sans', sans-serif;
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
}
#login { 
	width:336px;
	float:left
	
}
.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }
.button {background:#06F; color:#FFF
	}
#pic{
	width:1000px;
	margin-left:0;
	float:left	
	}	
input { 
	width: 90%; 
	padding: 5px;
	font-size: 13px;
	}

@media screen and (max-width:1335px){
	body{
		width:100%
		}
	#pic{width:75%
	}
	#login{width:25%
	}	
	
	}
        </style>

    
        <script src="js/prefixfree.min.js"></script>

    
  </head>
  
  <body>
  <div id="contain">
  <section id="pic">
<img src="images/bg2.jpg" width="931" height="700">
</section>

    <aside id="login">
	<img src="images/hcl.jpg" height="200" width="200">
  <p style="font-size:14px">Enter your organizational ID</p><br>
    <form method="post">
    	<input type="text" name="username" placeholder="Employee ID" required/><br><br>
        <input type="password" name="password" placeholder="Password" required /><br><br>
        <input type="submit" class="button" value="Sign in" style="width:80px">
        <p style="font-size:14px">Please enter your Employee ID and password to access Follow-Up Tracker</p> <br>
<a href="newReg.php" target="_blank"><p style="font-size:14px">Register New Project (for Project Manager)</p></a>
<a href="newRegEmp.php" onclick="window.open('newRegEmp.php', 'newwindow', 'width=600,height=300'); return false;"><p style="font-size:14px">Registeration for team member</p></a>
    </form>
        
    
</aside>
  </div>
       

    
    
   




<?php
//session_start();
if(isset($_POST['username'])&&isset($_POST['password']))
{
$username = $_POST['username'];
$password = $_POST['password'];

 
//echo $password_hash;


if(!empty($username)&&!empty($password))
{
$query = mysqli_query($con,"SELECT * FROM employe_master WHERE username = '$username' and password = '$password' and followup_status = '1'") or die(mysqli_error($con)); 
 
$data = mysqli_fetch_array($query);
 
$test=$data['password'];
 
$query_run=$query;
$query_num_rows = mysqli_num_rows($query_run);
if($query_num_rows==0)
{

echo '<script language="javascript">';
echo 'alert("Invalid employee id or password or employee not registered for followup tracker.")';
echo '</script>';

}
else
{
echo 'ok';
//$user_id= mysql_result($query_run,0,'id');
$user_id=$data['id'];
$_SESSION['user_id'] = $user_id;
header("Location:".$_SERVER['PHP_SELF']. " ");
}

 
}
else
{
echo '<font color="#FFFFFF">You must supply a username and password</font>';
}
 
}
 
?>

