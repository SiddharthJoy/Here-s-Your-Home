<?php
include('connection.php');
error_reporting(0);
// session_start();
$pid = $_GET['pid'];
?>

<?php
	$query = "Select * from postlocation where id = '$pid' ";
    $data = mysqli_query($conn ,$query);
	$res = mysqli_fetch_assoc($data);
	
	$lat = $res['lat'];
	$lng = $res['lng'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Location</title>
 <style>
    #map {
      width: 100%;
      height: 800px;
    }
  </style>
    <!--<link rel="stylesheet" type="text/css" href="./style.css" />-->

  </head>
  
      <script>
	// Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: <?php echo $lat ?>, lng: <?php echo $lng ?> };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
	</script>
  <body>
  

   <!-- <h3>My Google Maps Demo</h3>-->
    <!--The div element for the map -->
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>