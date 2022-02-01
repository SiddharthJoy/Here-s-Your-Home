<?php
include ("connection.php");
error_reporting(0);

$vkey = $_GET['vkey'];
$query = "select * from `emails` where vkey = '$vkey'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$email = $result['email'];

if(isset($_POST['sub'])) {
//declaring variables
  $filename = $_FILES['fileToUpload']['name'];
  $filetmpname = $_FILES['fileToUpload']['tmp_name'];
  $aun = $_POST ['un']; 

//  echo $aun;
  //echo $filename;
  //folder where images will be uploaded
  $folder = 'images/';
  //function for saving the uploaded images in a specific folder
  move_uploaded_file($filetmpname, $folder.$filename);

  if(!$filename) $filename = "150x150.png";

  //inserting image details (ie image name) in the database
  $sql = "INSERT INTO `image` (`username`,`image`)  VALUES ('$aun','$filename')";
  $qry = mysqli_query($conn,  $sql);
  //if( $qry) {
	//echo "image uploaded";
  //}
  $anm = $_POST ['name'];
    $aun = $_POST ['un'];
    $apass = $_POST ['pass'];
    $acnum = $_POST ['cnum'];
    $aadd = $_POST ['add'];
    $agn = $_POST ['gn'];
    
//    $query = "INSERT INTO `citizens`VALUES ('$nd','$nm' , '$mts', '$sid', '$dsgn', '$profid', 'gen', 'ag')";


    $query = "INSERT INTO `users` VALUES ('$aun','$anm','$apass','$acnum','$aadd','0','$email')";
	

    $data = mysqli_query($conn ,$query);
	
	if($data){
		?> <script> var oldURL = document.referrer;
					alert("Successfully Registered!Login to your account.");
					window.location = 'login1.php' </script> <?php		;	
		
		$query = "Delete from emails where vkey = '$vkey'";
		$data = mysqli_query($conn ,$query);
		
	}
	else{
		?> <script> var oldURL = document.referrer;
					alert("Username is taken! Please Try another one."); 
					window.location = oldURL </script> <?php		;
			//header('Location: ' . $_SERVER['HTTP_REFERER']);
			//header("location:javascript://history.go(-1)");
	}
	
	//if(mysqli_query($conn ,$query));
	
	

}
    
	


    if($data)
    {

      // echo "" . '<h6 style = "color:blue">Data Insterted Successfully in Users</h1>' . "<br>";
    }

    $pid = $aun.'000';

    $query = "INSERT INTO `post` VALUES ('$pid','12','12','12','12','12','12','3000-12-31')";

    $data = mysqli_query($conn ,$query);

    $query = "INSERT INTO `userpost` VALUES ('$aun','$pid')";

    $data = mysqli_query($conn ,$query);
	
	//header('location:login1.php');


    //if($data)
    //{
     // echo "" . '<h1 style = "color:blue">Data Insterted Successfully in Address</h1>' . "<br>";
    //}

    // $query = "Delete from `citizens` where NID = '0' ";

    // $data = mysqli_query($conn ,$query);
    // $query = "Delete from `registered_proffessions` where prof_ID = '' ";

    // $data = mysqli_query($conn ,$query);
    // $query = "Delete from `Address` where NID = '0' ";

    // $data = mysqli_query($conn ,$query);

    // $query = "INSERT INTO `citizens`VALUES ('$nd','$nm' , '$gen', '$ag', '$mts', '$sid', '$profid')";

    // $data = mysqli_query($conn ,$query);

    //if($data)
    //{
    //  echo "" . '<h1 style = "color:blue">Data Insterted Successfully in Citizens</h1>' . "<br>";
    //}
      //echo"Data Inserted Successfully in Professions";
    $data = 0;
   
    //if($data == 0) header('location:login1.php');
?>  

<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <title>Complete</title>
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
                     <h1>->Registration Complete</h1>
					
					   <h1>  &nbsp Thank You</h1>
                     <div class="product-sh">
                        <div class="col-sm-6">
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