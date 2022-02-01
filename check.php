<?php
session_start();
include('connection.php');
error_reporting(0);
$userprofile = $_SESSION['user_name'];
$query = "SELECT * FROM USERS WHERE Username = '$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$name = $result['Name'];

$query1 =  "SELECT * FROM image WHERE username = '$userprofile'";
$data1 = mysqli_query($conn,$query1);
$result1 = mysqli_fetch_assoc($data1);
$pic = $result1['image'];

$pid = $_GET['pid'];

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
      <link rel="stylesheet" href="css/bootstrap-select.min.css">
      <link rel="stylesheet" href="css/slick.min.css">
      <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/w3.css">
      <!--responsive css-->
      <link rel="stylesheet" href="css/responsive.css">
	  
	    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   </head>
  
   <script type="text/javascript"
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsZrS5LkAXAqzgVYMJQQMYOoWgYCHHZTU&callback=initMap&libraries=&v=weekly"></script>
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
                       
              
            <!--/.container-fluid --> 
         </nav>
      </header>
      <!-- Modal -->
      
    
   
      </div>
	   <div class="page-content-product">
         <div class="main-product">
		 <div class="w3-container">
            <div class="container">
               <div class="row clearfix">
      <div class="product-profile-box">
         <div class="container">
            <div class="row">
             
                           
                          
                        </div>
                        <div class="panel-body">
                           <div class="tab-content">
                              <div class="tab-pane fade in active" id="tab2default">
          <button class="w3-input w3-white w3-large w3-animate-input" align = "center">Set Work Location</button>


          <form action="check2.php" method="POST">
          
               
				
				<input type="hidden" name="lat" id = "maplat">
				<input type="hidden" name="lng" id = "maplng">
				<input type="hidden" name="pid" id = "postmp">
				<input type="hidden" name="bdw" id = "btn">
					
					<div id="map"></div>
<!-- <br>
<button  class="w3-green w3-round-xxlarge w3-hover-grey"  name = "sub" type="submit" value="Submit" width = 300> Confirm the Post </button>
<br> -->

<br>
	<div class="col-md-6 col-sm-6">
  <Button id="confirmPosition" name = "sub" type="submit"  class="w3-input w3-blue w3-round-xxlarge w3-animate-input w3-hover-grey"> <i class='material-icons'>airport_shuttle</i></button>
  </div>
  <div class="col-md-6 col-sm-6">
 <Button id="confirmPosition2" name = "sub2" type="submit"  class="w3-input w3-green w3-round-xxlarge w3-animate-input w3-hover-grey"> <i class='material-icons'>directions_walk</i></button>
  </div>	

        </form> 

<!-- <p>On idle position: <span id="onIdlePositionView"></span></p>
<p>On click position: <span id="onClickPositionView"></span></p> -->
<p></p>
<script>
  // Get element references
  
  var confirmBtn = document.getElementById('confirmPosition');
  var confirmBtn2 = document.getElementById('confirmPosition2');
  var confirmBtn3 = document.getElementById('confirmPosition3');
  
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
	document.getElementById("postmp").value=  <?php echo json_encode($pid) ?>;
	document.getElementById("btn").value=  "drive";
  };
  
  confirmBtn2.onclick = function () {
    // Get current location and show it in HTML
    var location = lp.getMarkerPosition();
    // onClickPositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;
	document.getElementById("maplat").value= location.lat;
	document.getElementById("maplng").value= location.lng;
	document.getElementById("postmp").value=  <?php echo json_encode($pid) ?>;
	document.getElementById("btn").value=  "walk";
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


?>


                             










  
 
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
   


