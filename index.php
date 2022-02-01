<?php
session_start();
include('connection.php');
error_reporting(0);
$userprofile = $_SESSION['user_name'];

if($userprofile) ;
else header('location:login1.php');

$query = "SELECT * FROM USERS WHERE Username = '$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$name = $result['Name'];

$query1 =  "SELECT * FROM image WHERE username = '$userprofile'";
$data1 = mysqli_query($conn,$query1);
$result1 = mysqli_fetch_assoc($data1);
$pic = $result1['image'];

?>
<!DOCTYPE html>
<html lang="en">
		
   <head>
      <meta charset="UTF-8">
      <title>Search</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--enable mobile device-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--fontawesome css-->
      <link rel="stylesheet" href="CSS1/font-awesome.min.css">
      <!--bootstrap css-->
      <link rel="stylesheet" href="CSS1/bootstrap.min.css">
      <!--animate css-->
      <link rel="stylesheet" href="CSS1/animate-wow.css">
            <link rel="shortcut icon" type = "image/png" href="images/iconX.png">

	  
      <!--main css-->
      <link rel="stylesheet" href="CSS1/style.css">
      <link rel="stylesheet" href="CSS1/bootstrap-select.min.css">
      <link rel="stylesheet" href="CSS1/slick.min.css">
      <!--responsive css-->
      <link rel="stylesheet" href="CSS1/responsive.css">
	  <link rel="stylesheet" href="css/w3.css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
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
						 <a href="index.php" class="navbar-brand"> <p><b><i><h3>Here's Your Home</h3></i></b></p></a>
                     </div>
                    
                  </div>
                  <div class="col-md-8 col-sm-12">
                     <div class="left-nav">
                        <div class="login-sr">
                          <div class="login-signup">
                              <ul>
                                  <li><a href="home.php"><b>Home</b></a></li>
                                  <li><a href="logout.php"><b>Log Out</b></a></li>
                              </ul>
                           </div>
                     
					 </div>
                  </div>
               </div>
 
            <!--/.container-fluid --> 
         </nav>
      </header>
      <!-- Modal -->
      
     
      <div class="page-content-product">
         <div class="main-product">
            <div class="container">
               <div class="row clearfix">
                  <div class="find-box">
				  
                     <h4></h4>
                     <h1>Search Here...</h1>
                     <h4></h4>
					 
        
         <form method="post" action="display.php">
                     <div class="product-sh">
                        <div class="col-sm-3">
                           <div class="form-sh">
                              <input type="text" name = "area" id = "area" class = "form-control" placeholder="Area" required autofocus >
                              <div id="areaList"></div>
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-sh">

                              <input type="number" placeholder="Room" class = "form-control" name = "room" id = "room" required autofocus>
                           </div>
                        </div>

                        <div class="col-sm-3">
                           <div class="form-sh">
                              <div class="form-sh">
                              <input type="number" class = "form-control" placeholder="Rent ( from )"  name = "mini" required autofocus>
                           </div>

                           <div class="form-sh">
                              <input type="number" class = "form-control" placeholder="Rent ( to )" name = "maxi" required autofocus > 
                           </div>
                           </div>
                        </div>

                        <label>&nbsp</label>
                        <div class="col-sm-3">
                           <div><b><input class="w3-input w3-blue w3-small  w3-hover-grey" type="submit" name = "sub" value = "Search"><a href="display.php"></a></div>
                        </div>
                           </div>
           </form>

                        <p>&nbsp </p>
                        <p>&nbsp </p>
                        <p>&nbsp </p>
                        <p>&nbsp </p>

                     </div>
                     </div>
                  </div>
               </div>
   </body>
</html>

