<?php
session_start();
include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Login</title>
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
                        <a href="login1.php" class="navbar-brand"> <p><b><i><h4>Here's Your Home</h4></i></b></p></a>

                     </div>
                    
                    
                  </div>
                  <div class="col-md-8 col-sm-12">
                     <div class="right-nav">
                        <div class="login-sr">
                          <div class="login-signup">
                              <ul>
                                   <!--<li><a href="home.php"><b>Home</b></a></li>-->
                                  <!--<li><a href="index.php"><b>Search</b></a></li>-->
                                  <li><a href="email.php"><b>Sign Up</b></a></li>
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

     
      <div class="page-content-product">
         <div class="main-product">
            <div class="container">
               <div class="row clearfix">
                  <div class="find-box">
                     <h1> Log In to Your Account </h1>
                     <div class="product-sh">
                        <div class="col-sm-10">
                     
                           
                          
                        </div>
                       
                       <form action="" method="POST">
                           <div class="form-sh">
                              
                              <input type="text" class = "form-control" name = "username" placeholder="Username" >
							  
                           </div>
						   <br>
						   <br>
                           <div class="form-sh">
                              <input type="Password" class = "form-control"name = "password" placeholder="Password" >
                           </div>
                     </div>
                        </div>
                           
                           <p><div class="form-sh"  align="center"> <a class="btn" href="#"><input name="submit" type="submit" value=" Login "></a> </div></p>
                   
                        </form>

                     <?php
                        if(isset($_POST['submit']))
                        {
                           $user = $_POST['username'];
                           $pass = $_POST['password'];
                           $query = "SELECT * FROM users WHERE Username = '$user' && password = '$pass'"; 
                           $data = mysqli_query($conn, $query);
                           $total = mysqli_num_rows($data);

                           if($total != 1){
                              $message = "Username and/or Password incorrect.\\nTry again.";
                               echo "<script type='text/javascript'>alert('$message');</script>";
                           }
                           else{
                              $_SESSION['user_name'] = $user;
                              header('location: profile.php');
                           }
                        }
                     ?>
     
                     </div>
                  </div>
               
               </div>
            </div>
         </div>
      </div>   
   </body>
</html>