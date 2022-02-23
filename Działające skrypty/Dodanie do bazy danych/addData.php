<?php
$servername = "localhost"; //Nazwa serwera
$username = "root"; //Nazwa użytkownika
$password = ""; //Hasło do konta użytkownika
$dbname = "test"; //Nazwa bazy danych

//Pomocnicze zmienne, $_POST to zmienne przechwytujące dane z formularza
$fname = $_POST['fname'];
$lname = $_POST['lname'];

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
    $sql = "INSERT INTO name (firstname, lastname) 
        VALUES ( '$fname', '$lname')";

    if ($conn->query($sql) === TRUE) {
        echo "Dane zostały poprawnie dodane";
            } else {
        echo "Błąd, coś poszło ne tak: " . $sql . "<br>" . $conn->error;
    }
?>