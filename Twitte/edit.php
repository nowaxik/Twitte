<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}

        include 'connect.php';
        $user_id = $_SESSION['id'];
        // Sprawdzenie połączenia
        if ($conn->connect_error) {
        die("Połącznie nie powiodło się, to jest powód: " . $conn->connect_error);
        }
        echo "Połączono z serwerem i bazą danych";
        
    $userview = $_POST['userview'];
    $username = $_POST['username'];
    $dates = $_POST['dates'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    //Skrypt dodania danych do tabeli
    //"name" to nazwa tabeli
    $sql = "UPDATE users SET userview='$userview', username='$username', dates='$dates', email='$email', pass='$pass' WHERE id='$user_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Dane zostały poprawnie zmienione <br>";
        echo "<a href='twitte.php'>Powrót</a>";
            } else {
        echo "Błąd, coś poszło ne tak: " . $sql . "<br>" . $conn->error;
    }
?>