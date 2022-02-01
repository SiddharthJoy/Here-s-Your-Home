<?php
session_start();
include('connection.php');
error_reporting(0);
$userprofile = $_SESSION['user_name'];
$id = $_GET['id']; 


if($id == $userprofile)
{
 header('location: profile.php');
} 
else if($id == true){
}
else{
  header('location: home.php');
}


$query1 =  "SELECT * FROM image WHERE username = '$id'";
$data1 = mysqli_query($conn,$query1);
$result1 = mysqli_fetch_assoc($data1);
$pic = $result1['image'];


$query1 =  "SELECT * FROM users WHERE username = '$id'";
$data1 = mysqli_query($conn,$query1);
$result1 = mysqli_fetch_assoc($data1);
$name = $result1['Name'];
$user = $result1['Username'];
$cn = $result1['CellNo'];
$em =  $result1['email'];
$address = $result1['Address'];
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>User Profile</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--enable mobile device-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--fontawesome css-->
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <!--bootstrap css-->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!--animate css-->
      <link rel="stylesheet" href="css/animate-wow.css">
      <!--main css-->
      <link rel="stylesheet" href="css/style.css">
            <link rel="shortcut icon" type = "image/png" href="images/iconX.png">

      <link rel="stylesheet" href="css/bootstrap-select.min.css">
      <link rel="stylesheet" href="css/slick.min.css">
      <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/w3.css">
      <!--responsive css-->
      <link rel="stylesheet" href="css/responsive.css">
   </head>
   <body>
    <header id="header" class="top-head">
         <!-- Static navbar -->
         <nav class="navbar navbar-default">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-4 col-sm-12 left-rs">
                     <div class="navbar-header">
                        <button type="button" id="top-menu" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"> 
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        </button>
                        <a href="index.php" class="navbar-brand"><img src="images/logo5.png" alt="" /></a>
                        <a href="index.php" class="navbar-brand"> <p><b><i><h4>Here's Your Home</h4></i></b></p></a>

                     </div>
                    
                    
                  </div>
                  <div class="col-md-8 col-sm-12">
                     <div class="right-nav">
                        <div class="login-sr">
                          <div class="login-signup">
                              <ul>
                                   <li><a href="home.php"><b>Home</b></a></li>
                                  <li><a href="index.php"><b>Search</b></a></li>
                               
                              </ul>
                           </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
            </div>
            <!--/.container-fluid --> 
         </nav>
      </header>
  
     
      <div class="profile-box banner-p">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="profile-b">
                     <img src="images/lag-63.png" alt="#" />
                     <div class="dit-p">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                           <div class="profile-left-b">
                              
                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="product-profile-box">
         <div class="container">
            <div class="row">
               <div class="col-md-2 col-sm-4 pr">
                  <div class="profile-pro-left">
                     <div class="left-profile-box-m">
                        <div class="pro-img">
                           <img src= "images/<?php echo $pic ?>"/ >

                        </div>
                        <div class="pof-text">
                           <h3><?php echo $name ?></h3>
                           <div class="check-box"></div>
                        </div>
                        <!-- <a href="#"></a> -->
                        <!-- <p><img src="images/report-icon.jpg" alt="" />Report this user</p> -->
                     </div>
                  </div>
               </div>
               <div class="col-md-10 col-sm-8">
                  <div class="profile-pro-right">
                     <div class="panel with-nav-tabs panel-default">
                       
                   
                         
                                 <div class="about-box">
                                    
  <h2><b>User Information</h2>

<div class="container">
  <div class="row">
    <div class="col-xs-9">
     
       <label>Name:</label><br>
            <h4><?php echo $name ?></h4><br>
       <label>Username:</label><br>
            <h4><?php echo $user ?></h4><br>

         <label>Mobile:</label><br>
            <h4>0<?php echo $cn ?></h4><br>
			 <label>Email:</label><br>
            <h4><?php if($em) echo $em;
				else echo "Not Provided"; ?></h4><br>
         <label>Address:</label><br>
            <h4><?php echo $address ?></h4><br>
      </div>
    </div>
  </div>
</div>


</body>
</html>
