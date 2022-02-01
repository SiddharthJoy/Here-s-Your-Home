<?php
session_start();
include('connection.php');
error_reporting(0);

if(isset($_POST['sub'])) {
	$lng = $_POST['lng'];
	$lat = $_POST['lat']; 
	$pid = $_POST['pid'];
	$type =  $_POST['bdw'];
}

if(isset($_POST['sub2'])) {
	$lng = $_POST['lng'];
	$lat = $_POST['lat']; 
	$pid = $_POST['pid'];
	$type =  $_POST['bdw'];
}

if(isset($_POST['sub3'])) {
	$lng = $_POST['lng'];
	$lat = $_POST['lat']; 
	$pid = $_POST['pid'];
	$type =  $_POST['bdw'];
}


 $query = "SELECT * FROM `postlocation` WHERE ID = '$pid' ";
 $data2 = mysqli_query($conn ,$query);
 $result111 = mysqli_fetch_assoc($data2);
 $slat = $result111['lat'];
 $slng = $result111['lng'];
 
 // echo $type;

?>
<!DOCTYPE html>
<html lang="en">
	
   <style>
		#map {
			width: 100%;
			height: 400px;
		}
		
		#map2 {
			width: 100%;
			height: 400px;
		}
	</style>
	
   <head>
      <meta charset="UTF-8">
      <title>Location</title>

      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--enable mobile device-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--fontawesome css-->
	  
	  
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="CSS1/font-awesome.min.css">
      <!--bootstrap css-->
      <link rel="stylesheet" href="CSS1/bootstrap.min.css">
      <!--animate css-->
      <link rel="stylesheet" href="CSS1/animate-wow.css">
	  <link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsZrS5LkAXAqzgVYMJQQMYOoWgYCHHZTU&libraries=places"></script>
	  
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
								  <li><a href="index.php"><b>Search</b></a></li>
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
      
	
	
  <body  onload="initialize()">
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
    font-size: 1.8em;
    line-height: 0.9em;
    margin: .2em 0;
    color: #2281ca;
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

.holiday text{
	color: white;
}
</style>
  
  
       
	  
	    
	     <div class="page-content-product">
         <div class="main-product">
		 <div class="w3-container">
            <div class="container">
               <div class="row clearfix">
                  <div class="find-box">
                 
				  
<script type="text/javascript">
  var directionDisplay;
  var directionsService = new google.maps.DirectionsService();
  var map;

  function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    var myOptions = {
      mapTypeId: google.maps.MapTypeId.ROADMAP,
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    directionsDisplay.setMap(map);
	
	var x = <?php echo strval($slat) ?>;
	var y = <?php echo strval($slng) ?>;
	
	var z = x+","+y;
	
	var xx = <?php echo strval($lat) ?>;
	var yy = <?php echo strval($lng) ?>;
	
	var zz = xx+","+yy;
	
	

    var start = z;
    var end = zz;
	
	var mode = <?php echo json_encode($type); ?>;
	
	
	if(mode == "drive"){
		var request = {
			origin:start, 
			destination:end,
			travelMode: google.maps.DirectionsTravelMode.DRIVING
		};
	}
	
	if(mode == "walk"){
		var request = {
			origin:start, 
			destination:end,
			travelMode: google.maps.DirectionsTravelMode.WALKING
		};
	}
	
	if(mode == "cycle"){
		var request = {
			origin:start, 
			destination:end,
			travelMode: google.maps.DirectionsTravelMode.BICYCLING
		};
	}
	
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        
        var myRoute = response.routes[0];
		directionsDisplay.setDirections(response);
		 // const output = document.querySelector('#output');
         console.log(response.routes[0].legs[0].distance.text);
		 console.log(response.routes[0].legs[0].duration.text);
		 
		 const output = document.querySelector('#output');
         if(mode == "drive") output.innerHTML = "<p><b>Driving distance</b> <i class='material-icons'>airport_shuttle</i> : <b>" + response.routes[0].legs[0].distance.text + "</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    <b>Duration <i class='material-icons'>hourglass_top</i> : " + response.routes[0].legs[0].duration.text;
         else output.innerHTML = "<p><b>Walking distance</b> <i class='material-icons'>directions_walk</i> : <b>" + response.routes[0].legs[0].distance.text + "</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   <b>Duration <i class='material-icons'>hourglass_top</i> : " + response.routes[0].legs[0].duration.text;

		
		// x = response.routes[0].legs[0].duration.text;
		
      }
	  else{
		   console.log("Error Happened");
	  }
    });
  }
</script>
                 

     
  
						

 <button class="w3-input w3-white w3-large w3-animate-input" align = "center">Direction (A = Post Location, B= Work Location)</button>
<div id="directions"></div>
<div id="map_canvas" style="width:780px;height:500px;"></div>
<div class = "w3-input w3-white"><button id="output"></button></div>







	
	
	
	

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
  
	
                     
					</div>
					
					
					<!-- <button class="w3-input w3-white w3-large w3-animate-input" align = "center"> Direction from the post location to your given location</button>
					 -->
                     </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
   
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   
    <script src="direction.js"></script>
   
   
   </body>
</html>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   

