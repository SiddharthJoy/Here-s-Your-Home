<?php
session_start();
include('connection.php');
error_reporting(0);
$userprofile = $_SESSION['user_name'];
$query = "SELECT * FROM USERS WHERE Username = '$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$name = $result['Name'];
?>




 <?php
	// $query = "Select * from postlocation where id = '$pid' ";
    // $data = mysqli_query($conn ,$query);
	// $res = mysqli_fetch_assoc($data);
	
	// $lat = $res['lat'];
	// $lng = $res['lng'];
 ?>

<!DOCTYPE html>
<html lang="en">
	
   <style>
		#map {
			width: 100%;
			height: 450px;
		}
		#legend {
			font-family: Arial, sans-serif;
			background: #fff;
			padding: 8px;
			margin: 8px;
			border: 1px solid #000;
		}

		#legend h3 {
			margin-top: 0;
		}

		#legend img {
			vertical-align: middle;
		}
	</style>
	
   <head>
      <meta charset="UTF-8">
      <title>Explore</title>
	
	 <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
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
      

<script>
	

</script>
   
				  
<script>
	// Initialize and add the map
function initMap() {
  var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
  var green_icon =  'http://maps.google.com/mapfiles/ms/icons/green-dot.png' ;
  var blue_icon =  'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' ;
  var yellow_icon =  'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png' ;
  var orange_icon =  'http://maps.google.com/mapfiles/ms/icons/orange-dot.png' ;
  var purple_icon =  'http://maps.google.com/mapfiles/ms/icons/purple-dot.png' ;
  
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 6,
    center: { lat: 23.8103, lng: 90.4125 },
  });
  
   const iconBase = "http://maps.google.com/mapfiles/ms/icons/";
  const icons = {
    green: {
      name: "< 5k TK",
      icon: iconBase + "green-dot.png",
    },
    blue: {
      name: "5k to 10k",
      icon: iconBase + "blue-dot.png",
    },
    purple: {
      name: "10k to 20k",
      icon: iconBase + "purple-dot.png",
    },
	 yellow: {
      name: "20k to 40k",
      icon: iconBase + "yellow-dot.png",
    },
	orange: {
      name: "40k to 60k",
      icon: iconBase + "orange-dot.png",
    },
	red: {
      name: " > 60k",
      icon: iconBase + "red-dot.png",
    },
  };
  const legend = document.getElementById("legend");

  for (const key in icons) {
    const type = icons[key];
    const name = type.name;
    const icon = type.icon;
    const div = document.createElement("div");
    div.innerHTML = '<img src="' + icon + '"> ' + name;
    legend.appendChild(div);
  }
  map.controls[google.maps.ControlPosition.LEFT_TOP].push(legend);
  // Create an array of alphabetical characters used to label the markers.
  const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  // const contentString = "<div id = "content"><p> Go to post </p> </div>";
  
   const infowindow = new google.maps.InfoWindow({
    content: "<p> Go to Post </p>",
  });
  
  

  // Add some markers to the map.
  // Note: The code uses the JavaScript Array.prototype.map() method to
  // create an array of markers based on a given "locations" array.
  // The map() method here has nothing to do with the Google Maps API.
  
   var cnt = 0;
  const markers = locations.map((location, i) => {
	thisIcon = pointers[i];
	var lnk = "showlocation.php?pid=" + ids[i];
	
    var marker = new google.maps.Marker({
      position: location,
	  icon: thisIcon,
	  animation: google.maps.Animation.DROP,
	  title: "Click for the post",
	  url: lnk,
      // label: labels[i % labels.length],
    });
	
	
	
	const infowindow = new google.maps.InfoWindow;
	
	google.maps.event.addListener(marker,'click',function(){
		window.location.href = marker.url;
	});
	
	return marker;
	
  });
  
 
  // Add a marker clusterer to manage the markers.
  new MarkerClusterer(map, markers, {
    imagePath:
      "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
  });
  
    marker.addListener("click", () => {
    infowindow.open({
      anchor: marker,
      map,
      shouldFocus: false,
    });
  });
  
 
 
  
}

const locations = [];
const pointers = [];
const ids = [];
	
	<?php
    $query = "SELECT * FROM `postlocation`";
    $result44 = array();
    $result44 = mysqli_query($conn ,$query);
    $cnt = 0;

    while($row=mysqli_fetch_array($result44)) {
		  $lat = $row['lat'];
		  $lng = $row['lng'];
		  $icon = $row['marker'];
		  $pid = $row['id'];
	?>
	
	 locations.push({ lat: <?php echo $lat ?>, lng: <?php echo $lng ?>});
	 var ic;
	 ic = <?php echo json_encode($icon) ?>;
	 pointers.push(ic);
	 ids.push(<?php echo json_encode($pid)?>);
	 
<?php } ?>

		

	</script>

	
	
	
	
  <body>
  
  

	  
       
	  
	
         <div class="main-product">
            
              
                  <div class="find-box">
                 
					 <h4></h4>
                     <h1>Filter Map Markers</h1>
                     <h4></h4>
					 
        
							 <form method="post" action="filter.php">
										 <div class="product-sh">
										 
											<div class="col-sm-3">
											   <div class="form-sh">
												  <select  id="area" name="area" class="form-control">
												  <option value="dhanmondi">Dhanmondi</option>
												  <option value="uttara">Uttara</option>
												  <option value="wari">Wari</option>
												  <option value="mirpur">Mirpur</option>
												   <option value="gulshan">Gulshan</option>
												   <option value="motijheel">Motijheel</option>
												   <option value="badda">Badda</option>

												</select>
												 
											   </div>
											</div>
											
											<div class="col-sm-3">
											   <div class="form-sh">
												    <div class="form-sh">
														<input type="number" class = "form-control" placeholder="Rent ( from )"  name = "mini" required autofocus>
													</div>
												</div>
											</div>
											
											<div class="col-sm-3">
											   <div class="form-sh">
												    <div class="form-sh">
														<input type="number" class = "form-control" placeholder="Rent ( to )"  name = "maxi" required autofocus>
													</div>
												</div>
											</div>

											
											<div class="col-sm-3">
											   <div><b><input class="w3-input w3-blue w3-small  w3-hover-grey" type="submit" name = "sub" value = "Search"><b></div>
											</div>
											   </div>
							   </form>
							   
							 
							    
								
								
								<p>&nbsp </p>
								<p>&nbsp </p>

  
	
								   <!-- <h3>My Google Maps Demo</h3>-->
									<!--The div element for the map -->
									<div id="map"></div>
									<div id="legend"><h5><b>Legend</h5></div>
	
									<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
									<script
									  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsZrS5LkAXAqzgVYMJQQMYOoWgYCHHZTU&callback=initMap&libraries=&v=weekly"
									  async
									></script>
				  
                     

                     
                    </div>
               
            
        </div>
	

   
   
   
   
   </body>
</html>

