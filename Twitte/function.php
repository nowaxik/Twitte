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

function ShowUsers() {
  
  include 'connect.php';
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Zarejestrowani użytkownicy:<br>";
        $sql = "SELECT status, username FROM users";
        $result = $conn->query($sql);

          if ($result->num_rows > 0) {
          // output data of each row
            while($row = $result->fetch_assoc()) {
                if ($row['status'] == 'online') {
                  echo "@".$row["username"]."  <img src='icon/twitter-online.png'><br>";
                  }
                  else {
                    echo "@".$row["username"]."  <img src='icon/twitter-offline.png'><br>";
                  }
            }
              } else {
                echo "0 results";
              }
  
   $conn->close();

}



?>