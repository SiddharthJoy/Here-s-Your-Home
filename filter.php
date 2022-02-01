<?php
session_start();
include('connection.php');
error_reporting(0);
$userprofile = $_SESSION['user_name'];
$query = "SELECT * FROM USERS WHERE Username = '$userprofile'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
$name = $result['Name'];

if(isset($_POST['sub'])) {
	$area = $_POST['area'];
	$min = $_POST['mini'];
	$max = $_POST['maxi'];
}


$query = "SELECT * FROM center WHERE area = '$area'";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);

$clat = $result['clat'];
$clng = $result['clng'];

?>



<!DOCTYPE html>
<html lang="en">
	
   <style>
		#map {
			width: 100%;
			height: 400px;
		}
	</style>
	
   <head>
      <meta charset="UTF-8">
      <title>Explore</title>
	
	 <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--enable mobile device-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--fontawesome css-->
      <link rel="stylesheet" href="CSS1/font-awesome.min.css">
      <!--bootstrap css-->
      <link rel="stylesheet" href="CSS1/bootstrap.min.css">
      <!--animate css-->
      <link rel="stylesheet" href="CSS1/animate-wow.css">
	  
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
  
  var clat = <?php echo $clat ?> ;
  var clng = <?php echo $clng ?> ;
  
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    center: { lat: clat, lng: clng },
  });
  
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
	thisIcon = pointers[cnt];
	var lnk = "showlocation.php?pid=" + ids[cnt++];
	
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
	$max++;
    $query = "SELECT * from post where Rent BETWEEN $min and $max";
    $result44 = array();
    $result44 = mysqli_query($conn ,$query);

    while($row=mysqli_fetch_array($result44)) {
		$id = $row['ID'];
		
		$query420 = "SELECT * from postlocation where id = '$id' ";
		$result420 = array();
		$result420 = mysqli_query($conn ,$query420);
		 
		 while($row42 = mysqli_fetch_array($result420)) {
			$lat = $row42['lat'];
			$lng = $row42['lng'];
			$icon = $row42['marker'];
			$pid = $row42['id'];
		 }
		 
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
                     <h1>Filter Again?</h1>
                     <h4></h4>
					 
        
							 <form method="post" action="filter2.php">
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
							   
							   <?php
									include ("connection.php");
									error_reporting(0);

									if(isset($_POST['sub'])) {
//declaring variables
										$aarea = $_POST ['area'];
										$min = $_POST ['mini'];
										$max = $_POST ['maxi'];

									   


									}
									
							   ?>
							    
								
								
								<p>&nbsp </p>
								<p>&nbsp </p>

  
	
								   <!-- <h3>My Google Maps Demo</h3>-->
									<!--The div element for the map -->
									<div id="map"></div>
	
									<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
									<script
									  src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyBsZrS5LkAXAqzgVYMJQQMYOoWgYCHHZTU&callback=initMap&libraries=&v=weekly"
									  async
									></script>
				  
                     

                     
                    </div>
               
            
        </div>
	

   
   
   
   
   </body>
</html>

