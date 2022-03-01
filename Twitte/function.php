<?php

include 'connect.php';

function PostImage() 
{
    
    $user_id = $_SESSION['id'];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
          }
    
            $PostImg = "SELECT img FROM users WHERE id=$user_id";
            $image = $conn->query($PostImg);
    
            if ($image->num_rows > 0) {
            // output data of each row
            while($pos = $image->fetch_assoc()) {
      ?>
                                
        <img src="img/<?php echo $pos["img"]; ?>" class="imgRadius" alt="Zdjecie profilowe" width="24" height="24">
    
      <?php
        }
      }
}



?>