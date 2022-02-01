<?php
session_start();
include ("connection.php");
error_reporting(0);



	$userprofile = $_SESSION['user_name'];
	$query = "SELECT * FROM users WHERE Username = '$userprofile'";
	$data = mysqli_query($conn,$query);
	$result = mysqli_fetch_assoc($data);
	
	$nameX = $result['Name'];
	$mobileX = $result['CellNo'];
	$emailX = $result['email'];
	
	$pid = $_GET['pid'];

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
	$pdf->Cell(0,10,"Here's Your Home ||  Payment Acknowledgement",1,1,'C');

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

//	$query = "Delete from userpost where ID = '$pid' ";
	//$data = mysqli_query($conn ,$query);


//	$query = "Delete from post where ID = '$pid' ";
//	$data = mysqli_query($conn ,$query);

//	$query = "Delete from postimg where ID = '$pid' ";
//	$data = mysqli_query($conn ,$query);

//	$query = "Delete from postlocation where ID = '$pid' ";
//	$data = mysqli_query($conn ,$query);
	
	$data = 1;
	
	if($data){
		 $to = $email;
		 $sub = "Here's Your Home || Payment Acknowledgement";
		 $message = "<a href = 'http://localhost/heresyourhome/newP/received.php?pid=$pid&from=$userprofile'>Click here & download the pdf</a>";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		 $headers .= "From: hyh0088@yahoo.com \r\n";
		 
		 mail($to,$sub,$message,$headers);
		 
		 $to = $emailX;
		 $sub = "Here's Your Home || Payment Acknowledgement";
		 $message = "<a href = 'http://localhost/heresyourhome/newP/received.php?pid=$pid&from=$userprofile'>Click here & download the pdf</a>";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		 $headers .= "From: hyh0088@yahoo.com \r\n";
		 
		 mail($to,$sub,$message,$headers);
		 
		 //header('location:thankyou.php');
	 }

?>