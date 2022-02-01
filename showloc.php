<?php
session_start();
include('connection.php');
error_reporting(0);
$userprofile = $_SESSION['user_name'];
$query = "SELECT * FROM USERS WHERE Username = '$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$name = $result['Name'];
?>

<?php
$pid = $_GET['pid'];
?>

<?php
	$query = "Select * from postlocation where id = '$pid' ";
    $data = mysqli_query($conn ,$query);
	$res = mysqli_fetch_assoc($data);
	
	$lat = $res['lat'];
	$lng = $res['lng'];
?>