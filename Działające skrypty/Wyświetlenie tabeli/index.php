<!-- Formularz dodawania imienia i nazwiska -->
<form action="addData.php" method="post">
    
    <label for="fname">Imię:</label><br>
    <input type="text" id="fname" name="fname"><br>
    
    <label for="lname">Nazwisko:</label><br>
    <input type="text" id="lname" name="lname"><br>
    
    <input type="submit" value="Dodaj" name="add">

</form>

<?php
$servername = "localhost"; //Nazwa serwera
$username = "root"; //Nazwa użytkownika
$password = ""; //Hasło do konta użytkownika
$dbname = "test"; //Nazwa bazy danych

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>