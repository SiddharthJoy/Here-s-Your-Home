<?php
session_start();
include ("connection.php");
error_reporting(0);



	//$userprofile = $_SESSION['user_name'];
	
	
	$pid = $_GET['pid'];
	$userprofile = $_GET['from'];
	
	$query = "SELECT * FROM users WHERE Username = '$userprofile'";
	$data = mysqli_query($conn,$query);
	$result = mysqli_fetch_assoc($data);
	
	$nameX = $result['Name'];
	$mobileX = $result['CellNo'];
	$emailX = $result['email'];
	
	$query = "SELECT * FROM `post` WHERE ID = '$pid'";
	$data = mysqli_query($conn ,$query);
	$result = mysqli_fetch_assoc($data);
        
	$amount = $result['advance'];
	$date = date("Y/m/d");

	

	$query = "SELECT * FROM `userpost` WHERE ID = '$pid'";
     $data = mysqli_query($conn ,$query);
     $result88 = mysqli_fetch_assoc($data);

     $payeeU = $result88['Username'];

     $query = "SELECT * FROM `users` WHERE Username = '$payeeU'";
     $data = mysqli_query($conn ,$query);
     $result88 = mysqli_fetch_assoc($data);

     $payee = $result88['Name'];
     $mobile = $result88['CellNo'];
     $email = $result88['email'];

     $sql = "INSERT into paid values ('$pid','$userprofile','$payeeU','$amount','$date')";
     $data = mysqli_query($conn ,$sql);





	//$to = $_GET['to'];
	require("fpdf/fpdf.php");
	$pdf = new FPDF();
	$pdf->AddPage();
	
	$pdf->SetFont("Arial","B",20);
	$pdf->Cell(0,10,"Here's Your Home",1,1,'C');

	$pdf->SetFont("Arial","",15);
	$pdf->Cell(0,20,"Payer Information:",0,1,'');

	$pdf->SetFont("Arial","",12);
	$pdf->Cell(0,5,"Name:					{$nameX}",0,1,'');
	$pdf->Cell(0,5,"Mobile:				0{$mobileX}",0,1,'');
	$pdf->Cell(0,5,"Email:				 {$emailX}",0,1,'');

	$pdf->SetFont("Arial","",25);
	$pdf->Cell(0,20,"Amount Paid:			{$amount}",0,1,'');


	$pdf->SetFont("Arial","",15);
	$pdf->Cell(0,15,"Payee Information:",0,1,'');

	$pdf->SetFont("Arial","",12);
	$pdf->Cell(0,5,"Name:       			{$payee}",0,1,'');
	$pdf->Cell(0,5,"Mobile:				 0{$mobile}",0,1,'');
	$pdf->Cell(0,5,"Email:				  {$email}",0,1,'');

	$pdf->SetFont("Arial","I",15);
	$pdf->Cell(0,20,"Post ID:			{$pid}",0,1,'');
	$pdf->Cell(0,1,"Transaction ID:     [Online Transaction ID]",0,1,'');


	$pdf->output();

?>