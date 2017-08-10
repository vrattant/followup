<?php 
$sql = "SELECT * FROM $proj";
	$result = mysqli_query($con,$sql)or die(mysqli_error());
	echo "<table border='2' align='center'>";
echo "<tr><th>Sno.</th><th>Employee HCL id</th><th>Name</th><th>Role</th><th>Email</th><th>Contact No.</th>
</tr>";
$i=1;
while($row = mysqli_fetch_array($result)) {
	$eid=$row['id'];
	$name= mysqli_query($con,"select * from employe_master where project_code='$proj' and id='$eid' ") or die(mysqli_error($con)); 
	$data2 = mysqli_fetch_array($name); 
	echo "<tr><td style='width: 50px;'>".$i."</td><td>".$row['id']."</td><td>".$data2['firstname']."  ".$data2['surname']."</td><td>".$row['designation']."</td><td>".$data2['email']."</td><td>".$data2['phone']."</td></tr>";
	$i++;
	}
	echo "</table>";
	?>