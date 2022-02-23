<?php

//Zmienne z formularza
$server = $_POST['server'];
$db = $_POST['db'];
$user = $_POST['user'];
$pass = $_POST['password'];

$servername = $server; //Nazwa serwera
$username = $user; //Nazwa użytkownika
$password = $pass; //Hasło do konta użytkownika


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

  $servername = $server; //Nazwa serwera
  $username = $user; //Nazwa użytkownika
  $password = $pass; //Hasło do konta użytkownika
  $dbname = $db; //Pobranie nazwy bazy danych
  
  // Tworzenie połącznenia
    $conn = new mysqli($servername, $username, $password, $dbname);
  // Sprawdzenie połącznienia 
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
  
  // Tabela przechowywująca Użytkowników 
      $sql = "CREATE TABLE Users (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      userview VARCHAR(30) NOT NULL,
      username VARCHAR(30) NOT NULL,
      dates DATE NOT NULL,
      email VARCHAR(50) NOT NULL,
      pass VARCHAR(50) NOT NULL,
      img VARCHAR(30) NOT NULL,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
  
  //Sprawdzenie czy tabela została poprawnie dodana do bazy danych
  if ($conn->query($sql) === TRUE) {
    echo "Tabela o nazwie Users została poprawnie utworzone <br>";
  } else {
    echo "Poś poszło nie tak: " . $conn->error;
  }

// Tabela przechowywująca wpisy użytkowników
$sql = "CREATE TABLE HomePage (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    posttext LONGTEXT NOT NULL,
    userview VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    heart INT(10), 
    add_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

//Sprawdzenie czy tabela została poprawnie dodana do bazy danych
if ($conn->query($sql) === TRUE) {
  echo "Tabela o nazwie Home Page została poprawnie utworzona <br>";
} else {
  echo "Poś poszło nie tak: " . $conn->error;
}

// Tabela przechowywująca komentarze do poszczegółnych wpisów. 
$sql = "CREATE TABLE Comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id INT(6) NOT NULL,
    comment_text LONGTEXT NOT NULL,
    userview VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

//Sprawdzenie czy tabela została poprawnie dodana do bazy danych
if ($conn->query($sql) === TRUE) {
  echo "Tabela o nazwie Comments została poprawnie utworzona <br>";
  echo "<a href='../index.php'>Powrót</a>";
} else {
  echo "Poś poszło nie tak: " . $conn->error;
}

//W przypadku gdyby był błąd w skłądni lub wystąpił nieoczekiwany bład podczas utworzenia 
//bazy danych, wyskoczy poniższy komunikat o błędzie 
} else {
  echo "Nie utworzono bazy danych: " . $conn->error;
}

$conn->close();
?>