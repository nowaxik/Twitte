<?php
include '../header.php';
?>


<header>
        <h3>Zarejestruj się:</h3>
        <form action="reg.php" method="post">
            <label for="fname">Wpisz login:</label><br>
            <input type="text" name="username" /><br>
            <label for="fname">Wpisz hasło:</label><br>
            <input type="password" name="pass" /><br>
            <label for="fname">Wpisz nazwę jaka się będzie wyświetlać:</label><br>
            <input type="text" name="userview" /><br>
            <label for="fname">Wpisz adres e-mail:</label><br>
            <input type="email" name="email" /><br>
            <label for="fname">Wpisz datę urodzenia (YYYY-MM-DD):</label><br>
            <input type="date" name="dateBir" /><br>
            <input type="submit" value="Wyślij" name="send" />
        </form>
</header>

<?php
include '../footer.php';
?> 
