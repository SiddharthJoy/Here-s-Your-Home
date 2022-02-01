<?php  
 $connect = mysqli_connect("localhost", "root", "", "webproject");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM post WHERE area LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["Area"].'</li>';  
           }  
      }  
      else  
      {  
           //$output .= '<li>Area Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  