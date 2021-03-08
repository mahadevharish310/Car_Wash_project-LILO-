<?php
include_once('connect.php');
if(isset($_POST['submit']))
{

$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['username'];
$password=$_POST['password'];

$studentvalue="";
$studentid = "SELECT id FROM lilo_car_wash.users ORDER BY id DESC LIMIT 1";
$StudentID = mysqli_query($conn, $studentid);

while ($row = mysqli_fetch_assoc($StudentID))
 {
	 $studentvalue=$row['id'];
 }

if ($studentvalue==''){
	$studentvalue=1;
}
else{
	$studentvalue=$studentvalue+1;

}
$query=mysqli_query($conn,"insert into lilo_car_wash.users(id,fullname,address,city,gender,username,password) values('$studentvalue','$fname','$address','$city','$gender','$email','$password')");
if($query)
{
	echo "Successfully Registered. You can login now";
}
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>User Registration</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    </head>

    <body style="text-align:center">
        <a href="../Registration.html"><h2>USER Registration</h2></a>
        <!-- start: REGISTER BOX -->
        <form name="registration" method="post">
            <fieldset>
                <legend>
                    Sign Up
                </legend>
                <p>
                    Enter your personal details below:
                </p>

                <div>
                    <input name="block_id" type="hidden" id="block_id" value="somevalue">

                    <p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
                    <input type="text" name="full_name" placeholder="Full Name" required>
                    <br>
                    <input type="text" name="address" placeholder="Address" required>
                    <br>
                    <input type="text" name="city" placeholder="City" required>
                    <br> Gender
                    <input type="radio" name="gender" value="female" required>
                    <label for="rg-female">
                        Female
                    </label>
                    <input type="radio" name="gender" value="male" required>
                    <label for="rg-male">
                        Male
                    </label>
                    <p>
                        Enter your account details below:
                    </p>
                    <input type="text" name="username" id="username" onBlur="checkAvailability()" placeholder="Username" required><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" />
                    <br>
                    <span id="user-availability-status" style="font-size:12px;"></span>
                    <br>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <br>
                    <input type="password" name="password_again" placeholder="Password Again" required>
                    <br>
                    <input type="checkbox" value="agree">
                    <label for="agree">
                        I agree
                    </label>
                    <p>
                        Already have an account?
                        <a href="user-login.php">
										Log-in
									</a>
                    </p>
                    <button type="submit" id="submit" name="submit">
                        Submit
                    </button>
            </fieldset>
        </form>

        <script>
            function checkAvailability() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "check_availability.php",
                    data: 'username=' + $("#username").val(),
                    type: "POST",
                    success: function(data) {
                        $("#user-availability-status").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>
    </body>

    </html>