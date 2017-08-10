<?php
$sql = "SELECT * FROM tasks_$proj where assignedto = '$userid'";
$result = mysqli_query($con,$sql)or die(mysqli_error());

?>
<?php
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d', time());
$today=date_create($date);
echo "<table border='2' align='center'>";

echo "<tr><th></th><th>Sno.</th><th>Task Code</th><th>Task Name</th><th>Assigned By</th><th>Dead Line</th><th>Days Remaining</th><th>Status</th>
</tr>";
$i=1;
while($row = mysqli_fetch_array($result)) {
    $no = $row['taskcode'];
	$eid1=$row['assignedby'];
	$completion=date_create($row['completiondate']);
	$diff=date_diff($today,$completion);
	$a= $diff->format("%R%a");
	$name1= mysqli_query($con,"select * from employe_master where project_code='$proj' and id='$eid1' ") or die(mysqli_error($con));
	$data3 = mysqli_fetch_array($name1);
	if($a > 2 && $row['status'] == "INCOMPLETE"){
    echo "<tr><td><input type = 'radio' name = 'group' value = '".$no."'>";echo"</td><td style='width: 50px;'>".$i."</td><td style='width: 200px;'>".$row['taskcode']."</td><td style='width: 200px;'>".$row['taskname']."</td><td style='width: 200px;'>".$data3['firstname']."  ".$data3['surname']."<td style='width: 200px;'>".$row['completiondate']."</td><td style='width: 200px;'>".$diff->format("%R%a days")."</td><td style='width: 200px;'>".$row['status']."</td></tr>";
	$i++;
	}
	elseif($a <= 2 && $row['status'] == "INCOMPLETE"){
		echo "<tr bgcolor=#FF0000'><td><input type = 'radio' name = 'group' value = '".$no."'>";echo"</td><td style='width: 50px;'>".$i."</td><td style='width: 200px;'>".$row['taskcode']."</td><td style='width: 200px;'>".$row['taskname']."</td><td style='width: 200px;'>".$data3['firstname']."  ".$data3['surname']."<td style='width: 200px;'>".$row['completiondate']."</td><td style='width: 200px;'>".$diff->format("%R%a days")."</td><td style='width: 200px;'>".$row['status']."</td></tr>";
		$i++;
		}
		elseif($row['status'] == "COMPLETE"){
			echo "<tr bgcolor='#00FF00'><td><input type = 'radio' name = 'group' value = '".$no."'>";echo"</td><td style='width: 50px;'>".$i."</td><td style='width: 200px;'>".$row['taskcode']."</td><td style='width: 200px;'>".$row['taskname']."</td><td style='width: 200px;'>".$data3['firstname']."  ".$data3['surname']."<td style='width: 200px;'>".$row['completiondate']."</td><td style='width: 200px;'>-</td><td style='width: 200px;'>".$row['status']."</td></tr>";
			$i++;
			}
		elseif($row['status'] == "EXT_REQ"){
		echo "<tr bgcolor='#FFFF00'><td><input type = 'radio' name = 'group' value = '".$no."'>";echo"</td><td style='width: 50px;'>".$i."</td><td style='width: 200px;'>".$row['taskcode']."</td><td style='width: 200px;'>".$row['taskname']."</td><td style='width: 200px;'>".$data3['firstname']."  ".$data3['surname']."<td style='width: 200px;'>".$row['completiondate']."</td><td style='width: 200px;'>".$diff->format("%R%a days")."</td><td style='width: 200px;'>".$row['status']."</td></tr>";
	$i++;	}	
	
	
}
echo"</table>";

?><br />

<input type="button" value="View" style="margin-left:14cm" onclick="check()" />
 
<br />
<div id="id"></div>
<script src="script/ajax.js"></script>
<script type="text/javascript">
function check(){
	var x= document.getElementsByName("group");
	var len = x.length;
	//window.scroll(0,200);
	for(i=0;i<len;i++){
		if(x[i].checked){
			$.ajax({
			type: "post",
			url: "mytaskAux.php",
			data: {id: x[i].value,id1: '<?php echo $proj ?>'},
			cache:false,
			success: function(html){
			 $('#id').html(html);
			 }
			});
			}
		}
		
	
	}


</script>

