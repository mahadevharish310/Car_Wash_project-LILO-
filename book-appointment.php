<?php
session_start();
include('connect.php');
include('checklogin.php');
check_login();


?>
    <html lang="en">



    <head>


        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="style.css" />

        <!--<link rel="stylesheet" type="text/css" href="style.css"/>-->

        <title>User | Book Appointment</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

    </head>

    <body>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <!-- start: PAGE TITLE -->
			<h1>User | Book Appointment</h1>

			<h5>Book Appointment</h5>

			<form role="form" name="book" method="post">

				<label for="service">
					Service
				</label>
				<div class="">
		<select name="service" id="service">
		<option value=''>------- Select --------</option>
		<?php 
		$sql = "select * from lilo_car_wash.service";
		$res = mysqli_query($conn, $sql);
		if(mysqli_num_rows($res) > 0) {
			while($row = mysqli_fetch_object($res)) {
			echo "<option value='".$row->serviceId."'>".$row->service."</option>";
			}
		}
		?>
		</select>
	</div>
				<br>
				<br>
				<label for="car-type">
					Car-type
				</label>
				<div class="">
		<select name="car" id="car">
		<option value=''>------- Select --------</option>
		<?php 
		$sql = "select * from lilo_car_wash.car";
		$res = mysqli_query($conn, $sql);
		if(mysqli_num_rows($res) > 0) {
			while($row = mysqli_fetch_object($res)) {
			echo "<option value='".$row->carId."'>".$row->carType."</option>";
			}
		}
		?>
		</select>
	</div>
				<br<br>

						<label for="AppointmentDate">
							Date
						</label>
						<input  type=date name="appdate" required="required" data-date-format="yyyy-mm-dd"  laceholder="yyyy-mm-dd" >
						<br<br>

							<label for="apptime">

								Time

							</label>
							<input type=time name="apptime"  required="required">eg : 10:00 PM
							<br<br>

								<button type="submit" name="appointmentsubmit" class="btn btn-o btn-primary">
									Submit
								</button>
			</form>

    </body>

	</html>
	
	<?php 
	$amount='';

	
	
	
		  
	if (isset($_POST['appointmentsubmit'])) {

	  if(isset($_POST['service']) && isset($_POST['car'])){

			if(($_POST['service'])=='1' && ($_POST['car'])=='1' ){
				$amount=45*1;
				echo '<br><input  type = "text" name = "amount" value="' . $amount . '" />';

			}
			elseif(($_POST['service'])=='1' && ($_POST['car'])=='2' ){
				$amount=45*2;
				echo '<input  type = "text" name = "amount" value="' . $amount . '" />';

			}
			elseif(($_POST['service'])=='1' && ($_POST['car'])=='3' ){
				$amount=45*3;
				echo '<input  type = "text" name = "amount" value="' . $amount . '" />';

			}
			elseif(($_POST['service'])=='2' && ($_POST['car'])=='1' ){
				$amount=95*1;
				echo '<input  type = "text" name = "amount" value="' . $amount . '" />';

			}
			elseif(($_POST['service'])=='2' && ($_POST['car'])=='2' ){
				$amount=95*2;
				echo '<input  type = "text" name = "amount" value="' . $amount . '" />';

			}
			elseif(($_POST['service'])=='2' && ($_POST['car'])=='3' ){
				$amount=95*3;
				echo '<input  type = "text" name = "amount" value="' . $amount . '" />';

			}
			elseif(($_POST['service'])=='3' && ($_POST['car'])=='1' ){
				$amount=175*1;
				echo '<input  type = "text" name = "amount" value="' . $amount . '" />';

			}
			elseif(($_POST['service'])=='3' && ($_POST['car'])=='2' ){
				$amount=175*2;
				echo '<input  type = "text" name = "amount" value="' . $amount . '" />';

			}
			elseif(($_POST['service'])=='3' && ($_POST['car'])=='3' ){
				$amount=175*3;
				echo '<input  type = "text" name = "amount" value="' . $amount . '" />';

			}
		}

	
	if(!empty($_POST['service']) || !empty($_POST['car']) || !empty($_POST['appdate']) || !empty($_POST['apptime']) ){
		$service=$_POST['service'];
		$car=$_POST['car'];
		$appdate=$_POST['appdate'];
		$apptime=$_POST['apptime'];
		$userId=$_SESSION['username'];

		$userstatus=1;
		$appointmentstatus=1;
	  $query=mysqli_query($conn,"insert into lilo_car_wash.appointment(service,userId,amount,appointmentDate,appointmentTime,userStatus,appointmentStatus) values('$service','$userid','$amount','$appdate','$apptime','$userstatus','$appointmentstatus')");
	  if(mysqli_query($conn, $query)){
		echo "<script>alert('Your appointment successfully booked');</script>";
	   $service='';
	   $car='';
	   $appdate='';
	   $apptime='';

	   } 
   else{
	   echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	   }
   }
}
	?>

