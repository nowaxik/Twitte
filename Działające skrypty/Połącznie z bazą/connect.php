<?php
$servername = "localhost"; //Nazwa serwera
$username = "root"; //Nazwa użytkownika
$password = ""; //Hasło do konta użytkownika
$dbname = "test"; //Nazwa bazy danych


// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
  die("Połącznie nie powiodło się, to jest powód: " . $conn->connect_error);
}
echo "Połączono z serwerem i bazą danych";
?>