<?php
include '../header.php';
?>


<section class="container-sm">
    <div class="row">
        <div class="formAuto">
            <div class="mx-auto" style="width: 100px;">
                <img src="../icon/twitter64.png" class="logoLogin">
            </div>
            <div class="form">
                <h3>Zarejestruj się:</h3>
                <form action="reg.php" method="post">
                    <label for="exampleInputEmail1" class="form-label">Wpisz login:</label><br>
                    <input class="form-control" id="exampleInputEmail1" type="text" name="username" /><br>
                    <label for="exampleInputEmail1" class="form-label">Wpisz hasło:</label><br>
                    <input class="form-control" id="exampleInputEmail1" type="password" name="pass" /><br>
                    <label for="exampleInputEmail1" class="form-label">Wpisz nazwę jaka się będzie wyświetlać:</label><br>
                    <input class="form-control" id="exampleInputEmail1" type="text" name="userview" /><br>
                    <label for="exampleInputEmail1" class="form-label">Wpisz adres e-mail:</label><br>
                    <input class="form-control" id="exampleInputEmail1" type="email" name="email" /><br>
                    <label for="exampleInputEmail1" class="form-label">Wpisz datę urodzenia (YYYY-MM-DD):</label><br>
                    <input class="form-control" id="exampleInputEmail1" type="date" name="dateBir" /><br>
                    <button type="submit"name="send" class="btn btn-primary">Wyślij</button>
                </form>
            </div>
        </div>
    </div>
</section

<?php
include '../footer.php';
?> 
