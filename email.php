<?php
include ("connection.php");
error_reporting(0);
?>



<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <title>Email Verification</title>
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
      <link rel="stylesheet" href="css/bootstrap-select.min.css">
      <link rel="stylesheet" href="css/slick.min.css">
      <link rel="stylesheet" href="css/jquery-ui.css">
            <link rel="shortcut icon" type = "image/png" href="images/iconX.png">

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
                        <a href="login1.php" class="navbar-brand"><img src="images/logo5.png" alt="" /></a>
						 <a href="login1.php" class="navbar-brand"> <p><b><i><h3>Here's Your Home</h3></i></b></p></a>
                     </div>
                    
                  </div>
                  <div class="col-md-8 col-sm-12">
                     <div class="right-nav">
                        <div class="login-sr">
                          <div class="login-signup">
                              <ul>
                                  <!--<li><a href="index.php"><b>Search</b></a></li>-->
                                  <li><a href="login1.php"><b>Login</b></a></li>
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
            <div class="container">
               <div class="">
                  <div class="find-box">
                     <h1>At first,verify your email! </h1>
                    
                       
           &nbsp &nbsp &nbsp  
		   
		   <form action="" method="POST">
                        
                           
                      
                           
                              <input class="w3-input w3-large" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" type="text" name = "email" id = "em" class = "" placeholder="Email Address" required autofocus >
                         
                          
                     
                     <br> 

                        
                             <input name = "sub" type="submit"  value="Send Verification Link" class="w3-input w3-blue w3-large  w3-hover-grey">   
			</form>	
			
			
<br><br><br><br>
<br><br><br><br>						
								</div>
						</div>
				</div>
		</div>
								
								</div>
        


<?php
include ("connection.php");
error_reporting(0);

if(isset($_POST['sub'])) {
	$e = $_POST ['email'];
	$vkey = md5(time().$e);
	
	echo $vkey;
	
	 $query = "INSERT INTO `emails` VALUES ('$e','$vkey')";
	 $data = mysqli_query($conn ,$query);
	 
	 if($data){
		 $to = $e;
		 $sub = "Here's Your Home Email Verification";
		 $message = "<a href = 'http://localhost/heresyourhome/newP/verify.php?vkey=$vkey'> Complete Register Account </a>";

       $headers  = 'MIME-Version: 1.0' . "\r\n";
       $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		 $headers .= "From: hyh0088@yahoo.com \r\n";
		 
		 mail($to,$sub,$message,$headers);
		 
		 header('location:thankyou.php');
	 }
}
   

?>  

                              <!--  <p><b> Choose Photo For DP</b></p>
                               <form action="upload.php" method="post" >
                                     <p> <input type="file" name="fileToUpload" id="fileToUpload"> </p>
                                               
                              </form>
 -->
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