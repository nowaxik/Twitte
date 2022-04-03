<?php
//Funkcja wyświetla zarejestrowanych użykowników
//oraz ich status online i offline
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

<?php
//Funkcja wyświetlająca małe zdjęcie profilowe przy
//Postach 
function ShortImage() {
  include 'connect.php';

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
      }

      $user_id = $_SESSION['id'];
      $user_name = $_SESSION['username'];
        $obraz = "SELECT img, username FROM users WHERE username=$user_name";
        $image = $conn->query($obraz);

        if ($image->num_rows > 0) {
        // output data of each row
        while($minimg = $image->fetch_assoc()) {
          if($minimg['username'] == $user_name)
          {             
    echo "<img src='img/".$minimg['img']."' class='imgRadiusShort' alt='Zdjecie profilowe' width='32' height='32'>";
          }
    }
  }
  $conn->close();
}
?>

<?php
//Funkcja wyświetlająca zdjęcie profilowe
function ShowFoto() {
  include 'connect.php';
  
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
      }
      $user_id = $_SESSION['id'];
        $zdjecie = "SELECT img FROM users WHERE id=$user_id";
        $obraz = $conn->query($zdjecie);

        if ($obraz->num_rows > 0) {
        // output data of each row
        while($mno = $obraz->fetch_assoc()) {
  
            ?>                
    <img src="img/<?php echo $mno["img"]; ?>" class="imgRadius" alt="Zdjecie profilowe" width="200" height="200">

          <?php
    }
  }
  
}
?>

