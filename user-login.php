<?php
session_start();
error_reporting(0);
include("connect.php");

if(isset($_POST['submit']))
{
$ret=mysqli_query($conn,"SELECT * FROM lilo_car_wash.users WHERE username='".$_POST['username']."' and password='".$_POST['password']."'");
$num=mysqli_fetch_array($ret);
echo $num;
if($num>0)
{
$extra="index.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($conn,"insert into lilo_car_wash.userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($conn,"insert into lilo_car_wash.userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
$extra="user-login.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>LILO Car Wash User-Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    </head>

    <body style="text-align:center;">
        <a href="user-login.php"><h2>LILO Car Wash User Login</h2></a>
        <form method="post">
            <fieldset>
                <legend>
                    Sign in to your account
                </legend>
                <p>
                    Please enter your name and password to log in.
                    <br />
                    <span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
                </p>
                <input type="text" name="username" placeholder="Username">
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <button type="submit" name="submit">
                    Login
                </button>
                <br> Don't have an account yet?
                <a href="registration.php">
									Create an account
								</a>
            </fieldset>
        </form>
    </body>

    </html>