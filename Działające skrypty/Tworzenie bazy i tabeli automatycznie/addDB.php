<?php
$servername = "localhost"; //Nazwa serwera
$username = "root"; //Nazwa użytkownika
$password = ""; //Hasło do konta użytkownika

$db = $_POST['dbname'];
// Tworzenie połącznenia
$conn = new mysqli($servername, $username, $password);
// Sprawdzenie połącznia 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Tworzenie nowej bazy danych
$sql = "CREATE DATABASE $db ";
if ($conn->query($sql) === TRUE) {
  
  //Skrypt dodania tabeli do powyższej bazy danych

  $servername = "localhost"; //Nazwa serwera
  $username = "root"; //Nazwa użytkownika
  $password = ""; //Hasło do konta użytkownika
  $db = $_POST['dbname']; //Pobranie nazwy bazy danych
  
  // Tworzenie połącznenia
    $conn = new mysqli($servername, $username, $password, $db);
  // Sprawdzenie połącznienia 
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
  
  // Struktura tabeli, która będzie dodana do bazy danych.
      $sql = "CREATE TABLE MyGuests (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(30) NOT NULL,
      lastname VARCHAR(30) NOT NULL,
      email VARCHAR(50),
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
  
  //Sprawdzenie czy tabela została poprawnie dodana do bazy danych
  if ($conn->query($sql) === TRUE) {
    echo "Baza danych oraz wszystkie tabele zostały poprawnie utworzone";
  } else {
    echo "Poś poszło nie tak: " . $conn->error;
  }

} else {
  echo "Nie utworzono bazy danych: " . $conn->error;
}

$conn->close();
?>