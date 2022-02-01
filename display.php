
<?php
include('connection.php');
error_reporting(0);
session_start();
include('connection.php');
error_reporting(0);
$userprofile = $_SESSION['user_name'];
$query = "SELECT * FROM USERS WHERE Username = '$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$name = $result['Name'];

if(isset($_POST['sub'])) {
//declaring variables
   $aarea = $_POST ['area'];
    $aroom = $_POST ['room'];
    $min = $_POST ['mini'];
    $max = $_POST ['maxi'];

   


}
    
?>



<!DOCTYPE html>
<html lang="en">
   <head>

    <style type="text/css">
      body{
        background-image: url(images/bg_main.png);
        background-size: cover;
        background-attachment: fixed;
      }
    </style>
      <!-- <meta charset="UTF-8"> -->
      <title>Search Result</title>
      <!-- <meta http-equiv="X-UA-Compatible" contet="IE=edge"> -->
      <!--enable mobile device-->
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
      <!--fontawesome css-->
      <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
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
            <!-- <div class="container-fluid"> -->
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
                     <!-- <div class="right-nav"> -->
                        <div class="login-sr">
                           <div class="login-signup">
                              <ul>
                                  <li><a  href="home.php"><b>Home</a></li>
                                  <li><a href="index.php"><b>Search</a></li>

                                  
                                  <?php

                                    if($userprofile){
                                      ?>
                                      <li><a  href="logout.php"><b>Log out</a></li>
                                    <?php }
                                      else{ ?>
                                         <li><a  href="login1.php"><b>Login</a></li>
                                     <?php } ?> 
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
      <!-- Modal -->
      <div class="modal fade lug" id="myModal" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Change</h4>
               </div>
               <div class="modal-body">
                  
               </div>
            </div>
         </div>
      </div>
     
     ? <div class="profile-box banner-p">
         <div class="container">
            <div class="row">
               <!-- <div class="col-md-12"> -->
                  <!-- <div class="profile-b"> -->
                     <!-- <img src="images/lag-63.png" alt="#" /> -->
                     <div class="dit-p">
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
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
                 
               </div>
               <div class="col-md-10 col-sm-8">
                  <div class="profile-pro-right">
                     <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading clearfix">
                           <ul class="nav nav-tabs pull-left">
                           
                              <li><a class="w3-input w3-white w3-xxlarge w3-animate-input">Search Result</a></li>
                             
                           
                          
                        </div>
                        <div class="panel-body">
                           <div class="tab-content">
                              <!-- <div class="tab-pane fade in active" id="tab2default"> -->
         


        <!--   <form class="w3-container" action="profile.php" method="POST">
          
               
                 <p>
                     <label>House NO</label><br>
                        <input class="w3-input w3-light-grey w3-animate-input" type="text" name="hn" required autofocus>
                     
                     
                </p>
            <p>
                        <label>Street</label><br>
                       <input class="w3-input w3-light-grey w3-animate-input" type="text" name="st" required autofocus>                        
                </p>
                <p>
                        <label>Rent</label><br>
                        <input class="w3-input w3-light-grey w3-animate-input" type="number" name="rnt" required autofocus>
                    
                </p>
                
                <p>
                     <label>Room</label><br>
                        <input class="w3-input w3-light-grey w3-animate-input" type="number" name="room" required autofocus>
                    
                </p>
            
             <p>
                     <label>Area</label><br>
                        <input class="w3-input w3-light-grey w3-animate-input" type="text" name="area" required autofocus>
                </p>
                <p>
                     <label>Disrict</label><br>
                        <input class="w3-input w3-light-grey w3-animate-input" type="text" name="dist" required autofocus>
                </p>
          <p>
                     <label>Date</label><br>
                        <input class="w3-input w3-light-grey w3-animate-input" type="Date" name="dt" required autofocus>
                </p>
                 
                 
                     <input name = "sub" type="submit" value="Submit" class="w3-input w3-blue w3-round-xxlarge w3-animate-input w3-hover-black">        
            </form>
       




                                 <div class="loding-box">
                                    
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab1default">
                                 <div class="about-box">
                                    <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Responsive Table with RWD-Table-Patterns</title>
  
 
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->

<!--   <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/rwd.table.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <h2>User Information</h2>

<div class="container">
  <div class="row">
    <div class="col-xs-9">
     
       <label>Name:</label><br>
            <h4><?php echo $name ?></h4><br>
       <label>Username:</label><br>
            <h4><?php echo $userprofile ?></h4><br>

            <?php
                $query = "select * from `users` where Username = '$userprofile'";
                $data = mysqli_query($conn ,$query);
                $res = mysqli_fetch_assoc($data);
                $cn = $res['CellNo'];
                $add = $res['Address'];
            ?>
         <label>Mobile:</label><br>
            <h4>0<?php echo $cn ?></h4><br>
         <label>Address:</label><br>
            <h4><?php echo $add ?></h4><br>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>


</body>
</html>
 





                                
                              </div>
                              <!-- <div class="tab-pane fade" id="tab3default"> -->
                                 <!-- <div class="about-box"> -->
<html >
<head>
  <meta charset="UTF-8">

  
 
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->

  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/rwd.table.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

<style>
.holiday {
    padding: 2em 0;
}
.holiday h3 {
    font-size: 4em;
    font-weight: 700;
    color: #34ad00;
}
.holiday p {
    font-size: 1.4em;
    line-height: 0.9em;
    margin: .2em 0;
    color: black;
}

.container {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
.rom-btm {
    margin-top: -.9em;
   box-shadow: 10px 10px 10px 10px rgba(.37, 0.37, 0.37, 0.37);
}
</style>

  
    <div class="w3-container">
      <div class="container">
   <div class="holiday">
   


<?php
    $query = "SELECT * FROM `post` where Area = '$aarea' and Room = '$aroom' and Rent between '$min' and '$max'";
     $result44 = array();
    $result44 = mysqli_query($conn ,$query);
    $cnt = 0;
   
   

    // while($row=mysqli_fetch_array($result33)) { 

    //      echo $row[0]; echo "<br>" ;

    //   }


?>
   
 <?php while($row=mysqli_fetch_array($result44)) { ?>

     <?php
          $id1 = $row['ID']; 
          $query = "SELECT * FROM `userpost` WHERE ID = '$id1' ";
          $data2 = mysqli_query($conn ,$query);
          $result88 = mysqli_fetch_assoc($data2);
          $cnt++;
		  
		  $query = "SELECT * FROM `postimg` WHERE ID = '$id1' ";
          $data2 = mysqli_query($conn ,$query);
          $result99 = mysqli_fetch_assoc($data2);
		  $pic = $result99['img'];
		  
		   $query = "SELECT * FROM `postcmnt` WHERE ID = '$id1' ";
          $data2 = mysqli_query($conn ,$query);
          $result111 = mysqli_fetch_assoc($data2);
		  $cmnt = $result111['comment'];
		  
      ?>
	  
	  <p style="color: white"><b>Posted by:<a href="view.php?id=<?php echo $result88['Username']?>" >  <?php echo "\t".'&nbsp'.$result88['Username']; ?> </a></p>
      <br>
      <!-- <b><i><h4><?php echo $userprofile?></h4> -->
      
     
	 
	 <div class=" row">
		<div class="col-md-4"
		
      <?php
          $id = $row[1]; 
          $query = "SELECT * FROM `post` WHERE ID = '$id'";
          $data = mysqli_query($conn ,$query);
          $result99 = mysqli_fetch_assoc($data);
      ?>

            
       
      <p style="color: white"><b>House Number: <?php echo '&nbsp'.'&nbsp'.'&nbsp'.$row['H/N']; ?> </p>
      <p style="color: white"><b>Street: <?php echo '&nbsp'.'&nbsp'.'&nbsp'.$row['Street']; ?> </p>   
      <p style="color: white"><b>Rent: <?php echo '&nbsp'.'&nbsp'.'&nbsp'.$row['Rent']; ?> </p>     
      <p style="color: white"><b>Room: <?php echo'&nbsp'.'&nbsp'.'&nbsp'. $row['Room']; ?> </p>  
      <p style="color: white"><b>Area:    <?php echo'&nbsp'.'&nbsp'.'&nbsp'. $row['Area']; ?> </p>     
      <p style="color: white"><b>District: <?php echo'&nbsp'.'&nbsp'.'&nbsp'. $row['District']; ?> </p> <br>
	  

     <a href="showlocation.php?pid=<?php echo $row['ID']; ?>" class="w3-button w3-teal" align = "right"  >Show on Map</a>
      <div class="clearfix"></div>
	  </div>
		<div class="col-md-3">
			<div class="image">
				 <img src= "post_images/<?php echo $pic ?>"/ >
			 </div>
		</div>
		<div class="col-md-3">
			<div class="image">
				<p style="color: white"><b><?php echo $cmnt ?></p>
			</div>
		</div>
      </div>
      <br><br>
     <?php }?>
      
     <br>
       
       </div>
      </div>
      </div>

</body>
</html>


