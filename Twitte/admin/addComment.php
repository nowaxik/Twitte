<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<?php
$servername = "localhost"; //Nazwa serwera
$username = "root"; //Nazwa użytkownika
$password = ""; //Hasło do konta użytkownika
$dbname = "twitte"; //Nazwa bazy danych

//Pomocnicze zmienne, $_POST to zmienne przechwytujące dane z formularza
$idPost = $_POST['id'];
$comment = $_POST['comment'];
$userviewcom = $_POST['userviewcom'];
$usernamedb = $_POST['usernamecom'];

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
  die("Połącznie nie powiodło się, to jest powód: " . $conn->connect_error);
}
echo "Połączono z serwerem i bazą danych";
?>

<?php
    //Skrypt dodania danych do tabeli
    //"name" to nazwa tabeli
    $sql = "INSERT INTO comments (comment_id, comment_text, userview, username) 
        VALUES ( '$idPost', '$comment', '$userviewcom', '$usernamedb')";

    if ($conn->query($sql) === TRUE) {
        echo "Dane zostały poprawnie dodane <br>";
        echo "<a href='twitte.php'>Powrót</a>";
            } else {
        echo "Błąd, coś poszło ne tak: " . $sql . "<br>" . $conn->error;
    }
?>