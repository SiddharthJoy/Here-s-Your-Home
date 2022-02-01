<?php
session_start();
include('connection.php');
error_reporting(0);
$userprofile = $_SESSION['user_name'];
$query = "SELECT * FROM users WHERE Username = '$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$name = $result['Name'];

$query1 =  "SELECT * FROM image WHERE username = '$userprofile'";
$data1 = mysqli_query($conn,$query1);
$result1 = mysqli_fetch_assoc($data1);
$pic = $result1['image'];

if($userprofile == true)
{

} 
else{
  header('location: login1.php');
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Profile</title>
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
   
   <script type="text/javascript"
          src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyBsZrS5LkAXAqzgVYMJQQMYOoWgYCHHZTU"></script>
  <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
  <style type="text/css">
    #map {
      width: 100%;
      height: 480px;
    }
  </style>
   
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
                     <div class="right-nav">
                        <div class="login-sr">
                           <div class="login-signup">
                              <ul>
                                 <li><a  href="home.php"><b>Home</b></a></li>
                                   <li><a  href="index.php"><b>Search</b></a></li>
                                 <li><a  href="logout.php"><b>Log Out</b></a></li>



                                 <!-- <li><a class="custom-b" href="#">Sign up</a></li> -->
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
                  <ul>
                     <li><a href="#"><img src="images/flag-up-1.png" alt="" /> United States</a></li>
                     <li><a href="#"><img src="images/flag-up-2.png" alt="" /> France </a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div id="sidebar" class="top-nav">
         <ul id="sidebar-nav" class="sidebar-nav">
            <li><a href="#">Help</a></li>
            <li><a href="#">How it works</a></li>
            
         </ul>
      </div>
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
                        <div class="panel-heading clearfix">
                           <ul class="nav nav-tabs pull-left">
                               <li><a href="#tab1default" data-toggle="tab">About</a></li>
                              <li class="active"><a href="#tab2default" data-toggle="tab">Post</a></li>
                               <li class=""><a href="#tab3default" data-toggle="tab">My Post</a></li>
                             
                           
                          
                        </div>
                        <div class="panel-body">
                           <div class="tab-content">
                              <div class="tab-pane fade in active" id="tab2default">
         


          <form id="contact" action="" method="POST" enctype = "multipart/form-data">
          
               
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
                        <label>Advance</label><br>
                        <input class="w3-input w3-light-grey w3-animate-input" type="number" name="adv" required autofocus>
                    
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
                     <label>District</label><br>
                        <input class="w3-input w3-light-grey w3-animate-input" type="text" name="dist" required autofocus>
                </p>
                <p>
                     <label>Bkash</label><br>
                        <input class="w3-input w3-light-grey w3-animate-input" type="number" name="Bkash" required="" autofocus="">
                </p>
                <p>
                     <label>Upload Image</label><br>
                        <input type="file" name="img">
                </p>
          <p>
                     <label>Date</label><br>
                        <input class="w3-input w3-light-grey w3-animate-input" type="Date" name="dt" required autofocus>
                </p>
				 <p>
                     <label>Comment</label><br>
                        <textarea class="w3-input w3-light-grey w3-animate-input" type="text" name="comment" required autofocus></textarea>
                </p>
				
				<input type="hidden" name="lat" id = "maplat">
				<input type="hidden" name="lng" id = "maplng">
					
					<div id="map"></div>
<!-- <br>
<button  class="w3-green w3-round-xxlarge w3-hover-grey"  name = "sub" type="submit" value="Submit" width = 300> Confirm the Post </button>
<br> -->

<br>

  <input id="confirmPosition" name = "sub" type="submit" value="Submit" class="w3-input w3-blue w3-round-xxlarge w3-animate-input w3-hover-grey">   
					 
            </form> 

<!-- <p>On idle position: <span id="onIdlePositionView"></span></p>
<p>On click position: <span id="onClickPositionView"></span></p> -->
<p></p>
<script>
  // Get element references
  var confirmBtn = document.getElementById('confirmPosition');
  var onClickPositionView = document.getElementById('onClickPositionView');
  var onIdlePositionView = document.getElementById('onIdlePositionView');

  // Initialize locationPicker plugin
  var lp = new locationPicker('map', {
    setCurrentPosition: true, // You can omit this, defaults to true
  }, {
    zoom: 15 // You can set any google map options here, zoom defaults to 15
  });

  // Listen to button onclick event
  confirmBtn.onclick = function () {
    // Get current location and show it in HTML
    var location = lp.getMarkerPosition();
    // onClickPositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;
	document.getElementById("maplat").value= location.lat;
	document.getElementById("maplng").value= location.lng;
  };

  // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
  google.maps.event.addListener(lp.map, 'idle', function (event) {
    // Get current location and show it in HTML
    var location = lp.getMarkerPosition();
    // onIdlePositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;
  });
</script>
			 
                    
                    <!-- <input name = "sub" type="submit" value="Submit" class="w3-input w3-blue w3-round-xxlarge w3-animate-input w3-hover-grey">   
					 
            </form> -->



<?php
include ("connection.php");
error_reporting(0);

// if(isset($_POST['sub'])) {
// //declaring variables

  

// }

if(isset($_POST['sub'])) {
   
   
   
   $ahn = $_POST ['hn'];
    $ast = $_POST ['st'];
    $arnt = $_POST ['rnt'];
   $advance = $_POST['adv'];
    $aroom = $_POST ['room'];
    $aarea = $_POST ['area'];
    $adist = $_POST ['dist'];
    $adt = $_POST ['dt'];
	$cmnt = $_POST['comment'];
	$lng = $_POST['lng'];
	$lat = $_POST['lat'];

   echo $advance;
	
	if($arnt < 5001) $icon = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
	else if($arnt < 10001) $icon = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png";
	else if($arnt < 20001) $icon = "http://maps.google.com/mapfiles/ms/icons/purple-dot.png";
	else if($arnt < 40001) $icon = "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png";
	else if($arnt < 60001) $icon = "http://maps.google.com/mapfiles/ms/icons/orange-dot.png";
	else $icon = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
	


    $query = "select count(username) from userpost where username = '$userprofile'";
    $data = mysqli_query($conn ,$query);
    $result = mysqli_fetch_assoc($data);
    $cnt = $result['count(username)'];
    $cnt = strval($cnt);
   
    $pid = $userprofile.date("Ymd").date("hisa");
	
	$filename = $_FILES['img']['name'];
   $filetmpname = $_FILES['img']['tmp_name'];
   // echo $filename;
   //folder where images will be uploaded
   $folder = 'post_images/';
   //function for saving the uploaded images in a specific folder
   move_uploaded_file($filetmpname, $folder.$filename);
   if(!$filename) $filename = "empty.jpg";
   

   // $_SESSION['pid'] = $pid;

   $sql = "INSERT INTO post VALUES ('$pid','$ahn','$ast','$arnt','$aroom','$aarea','$adist','$adt','0.0','0.0','$advance')";
   $qry = mysqli_query($conn,  $sql);

   if($qry){
      ?> <script> alert("Post Uploaded Succesfully!"); </script> <?php
   }

    $sql = "INSERT INTO `userpost` values ('$userprofile','$pid')";
   $qry = mysqli_query($conn,  $sql);
   
    $query = "INSERT INTO `postimg` (`ID`,`img`)  VALUES ('$pid','$filename')";

    $data = mysqli_query($conn ,$query);
	
	$query = "INSERT INTO `postcmnt` (`ID`,`comment`)  VALUES ('$pid','$cmnt')";

    $data = mysqli_query($conn ,$query);
	
	$query = "INSERT INTO `postlocation` VALUES ('$pid','$lat','$lng','$icon')";

    $data = mysqli_query($conn ,$query);
   
  

    $query = "select * from locations order by id desc limit 1";
    $data = mysqli_query($conn ,$query);
    $row = mysqli_fetch_assoc($data);

    $lng = $row['lng'];
    $lat = $row['lat'];

    $query = "UPDATE post SET lng = '$lng',lat = '$lat' WHERE ID = '$pid' ";
    $data = mysqli_query($conn,$query);
	
	// if($data){
	// 	?> 
   <!-- <script> alert("Post Uploaded Succesfully!"); </script>  -->
   <?php
	// }
	 
	 

}
    // $anm = $_POST ['name'];
    // $aun = $_POST ['un'];
    // $apass = $_POST ['pass'];
    // $acnum = $_POST ['cnum'];
    // $aadd = $_POST ['add'];
    // $agn = $_POST ['gn'];

    // $query = "select COUNT(username) from userpost where username = '$userprofile'";
    // $data = mysqli_query($conn ,$query);
    // $result = mysqli_fetch_assoc($data);
    // $cnt = $result['COUNT(username)'];
    // $cnt = strval($cnt);
    // echo $cnt;
    // $pid = $userprofile . $cnt;
    // echo $pid;
   // $str = strval($)
    
//    $query = "INSERT INTO `citizens`VALUES ('$nd','$nm' , '$mts', '$sid', '$dsgn', '$profid', 'gen', 'ag')";


    $query = "INSERT INTO `users` VALUES ('$aun','$anm','$apass','$acnum','$aadd','0')";

    $data = mysqli_query($conn ,$query);


    if($data)
    {

      // echo "" . '<h6 style = "color:blue">Data Insterted Successfully in Users</h1>' . "<br>";
    }
	
    $pid = $aun.'000';

    $query = "INSERT INTO `post` VALUES ('$pid','12','12','12','12','12','12','3000-12-31')";

    $data = mysqli_query($conn ,$query);

    $query = "INSERT INTO `userpost` VALUES ('$aun','$pid')";

    $data = mysqli_query($conn ,$query);
	
	


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

   

   

?>  

 


                                 <div class="loding-box">
                                   <!--  <li><a class="w5-input w5-blue w5-medium w5-animate-input w5-hover-red" href="user-map.php"><b>Add Location</b></a></li> -->
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab1default">
                                 <div class="about-box">
                                    <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  
 
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->

  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
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
				$em = $res['email'];
            ?>
         <label>Mobile:</label><br>
            <h4>0<?php echo $cn ?></h4><br>
			<label>Email:</label><br>
			<h4><?php if($em) echo $em;
				else echo "Not Provided"; ?></h4><br>
         <label>Address:</label><br>
            <h4><?php echo $add ?></h4><br>
      </div><!--end of .table-responsive-->
    </div>
  </div>
</div>


</body>
</html>






                                
                              </div>
                              <div class="tab-pane fade" id="tab3default">
                                 <div class="about-box">
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
    line-height: 1.2em;
    margin: .5em 0;
    color: black;
}

.container {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
.rom-btm {
    margin-top: 2em;
   box-shadow: 0px 0px 5px -1px rgba(0, 0, 0, 0.37);
}
</style>

  
    <div class="w3-container">
      <div class="container">
   <div class="holiday">
   


<?php
    $query = "SELECT * FROM `userpost` WHERE Username = '$userprofile' ";
     $result33 = array();
    $result33 = mysqli_query($conn ,$query);
   
   

    // while($row=mysqli_fetch_array($result33)) { 

    //      echo $row[0]; echo "<br>" ;

    //   }


?>
   
 <?php while($row=mysqli_fetch_array($result33)) { ?>
     
     <br><p style="color: blue"> <b><?php echo $userprofile?></p>
     <div class=" row">
		<div class="col-md-3"
      
      <?php
          $id = $row[1]; 
          $query = "SELECT * FROM `post` WHERE ID = '$id'";
          $data = mysqli_query($conn ,$query);
          $result99 = mysqli_fetch_assoc($data);
		  
		  $query = "SELECT * FROM `postimg` WHERE ID = '$id' ";
          $data2 = mysqli_query($conn ,$query);
          $result88 = mysqli_fetch_assoc($data2);
		  $pic = $result88['img'];
		  
		  $query = "SELECT * FROM `postcmnt` WHERE ID = '$id' ";
          $data2 = mysqli_query($conn ,$query);
          $result111 = mysqli_fetch_assoc($data2);
		  $cmnt = $result111['comment'];
		  
      ?>

               
       <p></p>
      <p><b>House Number: <?php echo $result99['H/N']; ?> </p>
      <p><b>Street: <?php echo $result99['Street']; ?> </p>   
      <p><b>Rent: <?php echo $result99['Rent']; ?> </p>     
      <p><b>Room: <?php echo $result99['Room']; ?> </p>  
      <p><b>Area:    <?php echo $result99['Area']; ?> </p>     
      <p><b>District: <?php echo $result99['District']; ?> </p>
      <p style="color: black"><b><i>Advance: <span style="color: red"><?php echo'&nbsp'.'&nbsp'.'&nbsp'. $result99['advance']; ?></span> </p> <br>
   

     <a href="showlocation.php?pid=<?php echo $row['ID'] ?>" class="w3-button w3-teal" align = "right"  >Show On Map</a>
     <a action = "profile.php" href="delete.php?pid=<?php echo $row['ID']; ?>" class="w3-button w3-teal" align = "right"  >Delete</a>

      </div>
	  
	  <div class="col-md-3">
			<div class="image">
				 <img src= "post_images/<?php echo $pic ?>"/ >
			 </div>
		</div>
		<div class="col-md-3">
			<div class="image">
				<?php echo $cmnt ?><br>
			</div>
		</div>
		</div>
     <?php }?>
      
     <br>
       
       </div>
      </div>
      </div>

</body>
</html>



     
      <!--main js--> 
      <script src="js/jquery-1.12.4.min.js"></script> 
      <!--bootstrap js--> 
      <script src="js/bootstrap.min.js"></script> 
      <script src="js/bootstrap-select.min.js"></script>
      <script src="js/slick.min.js"></script> 
      <script src="js/jquery-ui.js"></script> 
      <script src="js/wow.min.js"></script> 
      <!--custom js--> 
      <script src="js/custom.js"></script>
   </body>
</html>