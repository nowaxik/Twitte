<?php
$servername = "localhost"; //Nazwa serwera
$username = "root"; //Nazwa użytkownika
$password = ""; //Hasło do konta użytkownika
$dbname = "twitte"; //Nazwa bazy danych

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
  die("Połącznie nie powiodło się, to jest powód: " . $conn->connect_error);
}
echo "Połączono z serwerem i bazą danych";
?>

<?php

$user = $_POST['username'];
$pass = $_POST['pass'];
$userview = $_POST['userview'];
$email = $_POST['email'];
$data = $_POST['dateBir'];

    //Skrypt dodania danych do tabeli
    //"name" to nazwa tabeli
    $sql = "INSERT INTO users (userview, username, dates, email, pass) 
        VALUES ( '$userview', '$user', '$data', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "Dane zostały poprawnie dodane";
            } else {
        echo "Błąd, coś poszło ne tak: " . $sql . "<br>" . $conn->error;
    }
?>