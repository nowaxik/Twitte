<?php
include 'header.php';
?>


<section class="container-sm">
    <div class="row">
        <div class="formAuto">
            <div class="mx-auto" style="width: 100px;">
                <img src="icon/twitter64.png" class="logoLogin">
            </div>
            <div class="form">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Podaj login:</label><br> 
                        <input class="form-control" id="exampleInputEmail1" type="text" name="login" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Podaj hasło:</label><br>
                        <input class="form-control" id="exampleInputEmail1" type="password" name="pass" /><br>
                        <button type="submit"name="send" class="btn btn-primary">Wyślij</button>
                    </div>
                </form>
                <a class="link" href="Registration/index.php">Rejestracja</a>
            </div>
        </div>
    </div>
</section>


<?php
include 'footer.php';
?> 