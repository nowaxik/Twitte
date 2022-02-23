<?php
include 'header.php';
?>


<section class="container-sm">
    <div class="row">
        <div class="formAuto">
            <h3>Panel logowania</h3>
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
        </div>
    </div>
</section>


<?php
include 'footer.php';
?> 