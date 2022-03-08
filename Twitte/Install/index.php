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
                <h3>Instalacja portalu</h3>
                <form action="install.php" method="post">
                    <label for="exampleInputEmail1" class="form-label">Wpisza adres serwera: </label><br> 
                    <input class="form-control" id="exampleInputEmail1" type="text" name="server"/> <br> 
                    <label for="exampleInputEmail1" class="form-label">Wpisz nazwę bazy danych: </label><br> 
                    <input class="form-control" id="exampleInputEmail1" type="text" name="db"/> <br> 
                    <label for="exampleInputEmail1" class="form-label">Nazwa użytkownika w bazie danych: </label><br> 
                    <input class="form-control" id="exampleInputEmail1" type="text" name="user"/> <br> 
                    <label for="exampleInputEmail1" class="form-label">Podaj hasło do konta użytkownika: </label><br> 
                    <input class="form-control" id="exampleInputEmail1" type="text" name="password"/> <br> 
                    <button type="submit"name="send" class="btn btn-primary">Wyślij</button>
                </form>
            </div>
        </div>
    </div>
</section

<?php
include '../footer.php';
?> 
