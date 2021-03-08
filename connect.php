
<?php
$servername = "localhost";
$username = "lilo";
$password = "pCxsgIQY1peYAtjo";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>