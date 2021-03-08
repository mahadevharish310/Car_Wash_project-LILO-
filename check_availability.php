<?php 
require_once("connect.php");
if(!empty($_POST["username"])) {
	$email= $_POST["username"];
		$result =mysqli_query($conn,"SELECT username FROM lilo_car_wash.users WHERE username='$email'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> userName already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> userName available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
?>
