<?php
include ("connection.php");
error_reporting(0);

$pid = $_GET['pid'];

$query = "SELECT * FROM `post` WHERE ID = '$pid'";
$data = mysqli_query($conn ,$query);
$result = mysqli_fetch_assoc($data);
     
$amount = $result['advance'];



?>



<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <title>Confirm?</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--enable mobile device-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--fontawesome css-->
      <link rel="stylesheet" href="css/font-awesome.min.css">
            <link rel="shortcut icon" type = "image/png" href="images/iconX.png">

      <!--bootstrap css-->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!--animate css-->
      <link rel="stylesheet" href="css/animate-wow.css">
      <!--main css-->
      <link rel="stylesheet" href="css/style.css">
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
                        <a href="home.php" class="navbar-brand"><img src="images/logo5.png" alt="" /></a>
						 <a href="home.php" class="navbar-brand"> <p><b><i><h3>Here's Your Home</h3></i></b></p></a>
                     </div>
                    
                  </div>
                  <div class="col-md-8 col-sm-12">
                     <div class="right-nav">
                        <div class="login-sr">
                          <div class="login-signup">
                              <ul>
                                  <!--<li><a href="index.php"><b>Search</b></a></li>-->
                                  <li><a href="logout.php"><b>Logout</b></a></li>
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
     
     
      <div class="">
         <div class="main-product">
          
               <div class="">
                  <div class="find-box">
                     <h1> Are You sure you want to pay <?php echo $amount ?> tk as advance?</h1>
					<!--   <h1>-> Click on the Link</h1>
					   <h1>  &nbsp Thank You</h1> -->
                 <div class="col-6">
                  
                  <a href = "report.php?pid=<?php echo $pid ?>"> <input id="confirmPosition" name = "sub" type="submit" value="Confirm" class="w3-input w3-green w3-round-xxlarge w3-animate-input w3-hover-grey"> </a>  <br>
                  
                  <a href="javascript:history.go(-1)"><input id="confirmPosition" name = "sub" type="submit" value="Cancel" class="w3-input w3-red w3-round-xxlarge w3-animate-input w3-hover-grey"> </a>
               </div>
                      
           &nbsp &nbsp &nbsp  
		   
		  

<br><br><br><br>						
								</div>
						</div>
				</div>
		</div>
								</div>
								</div>
								</div>
        


                           </div>
                        </div>
                           
                           <!-- <p><div class="form-sh" class="col-sm-6" type = "Submit"> <a class="btn" href="#">Submit</a> </div></p>
          -->
                       
                     </div>
                  </div>
               
               </div>
            </div>
         </div>
      </div>
      
     

   </body>
</html> 