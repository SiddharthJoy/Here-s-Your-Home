<?php
session_start();
include('connection.php');
error_reporting(0);

$pid = $_GET['pid'];

echo $pid;

$query = "Delete from userpost where ID = '$pid' ";
$data = mysqli_query($conn ,$query);


$query = "Delete from post where ID = '$pid' ";
$data = mysqli_query($conn ,$query);

$query = "Delete from postimg where ID = '$pid' ";
$data = mysqli_query($conn ,$query);

$query = "Delete from postlocation where ID = '$pid' ";
$data = mysqli_query($conn ,$query);


 header('location: profile.php');


?>
