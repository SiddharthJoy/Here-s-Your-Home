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
	
	  <?php 
          $query = "SELECT * FROM `post` WHERE ID = '$pid'";
          $data = mysqli_query($conn ,$query);
          $row = mysqli_fetch_assoc($data);
		  
		  $query = "SELECT * FROM `postimg` WHERE ID = '$pid'";
          $data = mysqli_query($conn ,$query);
          $result = mysqli_fetch_assoc($data);
		  
		  $pic = $result['img'];
		  
		   $query = "SELECT * FROM `postcmnt` WHERE ID = '$pid'";
          $data = mysqli_query($conn ,$query);
          $result11 = mysqli_fetch_assoc($data);
		  
		  $cmnt = $result11['comment'];
		  
		  $query = "SELECT * FROM `userpost` WHERE ID = '$pid'";
          $data = mysqli_query($conn ,$query);
          $result88 = mysqli_fetch_assoc($data);

          $poster = $result88['Username'];
		  
		  // $cmnt = $result88['comment'];
		  
		  
      ?>
	
	
	
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
  
   
       
	  
	     <div class="page-content-product">
         <div class="main-product">
		 <div class="w3-container">
            <div class="container">
               <div class="row clearfix">
                  <div class="find-box">
                  <div class="holiday">
				  
					<p style="color: white"><b>Posted by:<a href="view.php?id=<?php echo $result88['Username']?>" >  <?php echo "\t".'&nbsp'.$result88['Username']; ?> </a></p>
      <br>
      <!-- <b><i><h4><?php echo $userprofile?></h4> -->
     <div class=" row">
		<div class="col-md-4"
      <p></p>
		 <p style="color: white"><b>House Number: <?php echo '&nbsp'.'&nbsp'.'&nbsp'.$row['H/N']; ?> </p>
      <p style="color: white"><b>Street: <?php echo '&nbsp'.'&nbsp'.'&nbsp'.$row['Street']; ?> </p>   
      <p style="color: white"><b>Rent: <?php echo '&nbsp'.'&nbsp'.'&nbsp'.$row['Rent']; ?> </p>     
      <p style="color: white"><b>Room: <?php echo'&nbsp'.'&nbsp'.'&nbsp'. $row['Room']; ?> </p>  
      <p style="color: white"><b>Area:    <?php echo'&nbsp'.'&nbsp'.'&nbsp'. $row['Area']; ?> </p>     
      <p style="color: white"><b>District: <?php echo'&nbsp'.'&nbsp'.'&nbsp'. $row['District']; ?> </p>
      <p style="color: white"><b><i>Advance: <span style="color: red"><?php echo'&nbsp'.'&nbsp'.'&nbsp'. $row['advance']; ?></span> </p> <br>

	  
      <a class="w3-input w3-white w3-large w3-animate-input">Location on Map</a>
      <div class="clearfix"></div>
	  </div>
		<div class="col-md-4">
			<div class="image">
				 <img src= "post_images/<?php echo $pic ?>"/ >
			 </div>
		</div>
		<div class="col-md-4">
			<div class="image">
				<p style="color: white"><b><?php echo $cmnt ?></p>
			</div>
		</div>
      </div>
	  
	  
      

  

   <!-- <h3>My Google Maps Demo</h3>-->
    <!--The div element for the map -->
    <div id="map"></div>
	
	
	
	

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsZrS5LkAXAqzgVYMJQQMYOoWgYCHHZTU&callback=initMap&libraries=&v=weekly"
	  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsZrS5LkAXAqzgVYMJQQMYOoWgYCHHZTU&callback=initMaps&libraries=&v=weekly"
      <!-- src="https://maps.googleapis.com/maps/api/js?key=&callback=AIzaSyBjOnszOWfv5AzUzY1xiQicL9wlLYzmt0MinitMap&libraries=&v=weekly" -->
      async
    ></script>
	
                     
					</div>
					 <button class="w3-input w3-white w3-large w3-animate-input" align = "center"><a href = "check.php?pid=<?php echo $pid ?>">Check Direction & Distance from Your Workspace</button>

                        <?php 
                           if($userprofile != $poster){

                            ?>
                            <br>
                            <button class="w3-input w3-white w3-large w3-animate-input" align = "center"><a href = "confirm.php?pid=<?php echo $pid ?>"> Pay Advance </button>
                            <?php
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

