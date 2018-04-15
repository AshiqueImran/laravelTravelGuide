 <?php  
 $connect = mysqli_connect("localhost", "tiger", "353535", "travelguide");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query ="SELECT plcaeName FROM placetable WHERE plcaeName LIKE '".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["plcaeName"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?> 