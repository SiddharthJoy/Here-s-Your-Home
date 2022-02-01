<?php
session_start();
include('connection.php');

?>

 <form id="contact" action="" method="POST" enctype = "multipart/form-data">
                        
                          
                             <p><b> Profile Picture(150 x 150)</b></p>
                            
                                  <p> <input type="file" name="fileToUpload" /> </p><br><br>
                        
                            <input name = "sub" type="submit"  value="Submit" class="w3-input w3-blue w3-large  w3-hover-grey">   
</form>

<?php
include ("connection.php");
error_reporting(0);

if(isset($_POST['sub'])) {
//declaring variables
  $filename = $_FILES['fileToUpload']['name'];
  $filetmpname = $_FILES['fileToUpload']['tmp_name'];
  
  echo $filename;
  //folder where images will be uploaded
  $folder = 'post_images/';
  //function for saving the uploaded images in a specific folder
  move_uploaded_file($filetmpname, $folder.$filename);

}