<?php
    //Rozpoczęcie sesji gdy zostałeś poprawnie zalogowanym
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
?>

<?php
include 'header.php';
$user_id = $_SESSION['id'];
?>
<!-- Główne okno siatki -->
<div class="container-md">
    <div class="row justify-content-center">
        <div class="col-3">
            <!-- Lewa strona okna, jest tam menu oraz informacje o użytkowniku -->
            <div class="TwitteProfile">
                <?php
                    echo "Witaj <b>".$_SESSION['userview'].'!</b>';
                    $id_user = $_SESSION['id'];
                ?>
                <!-- Wyświetlenie odliczania ważności Sesji-->
                <section>
                    <script src="js/main.js"></script>
                        <small>
                            Sesja wygaśnie za:
                            <p></p>
                        </small>
                </section>
                <!-- Konic wyświetlania zegara -->
                <!-- Menu -->
                <section>
                    <?php include 'nav.php'; ?>
                </section> 
                <!-- Koniec Menu -->
            </div>
        </div>

        <div class="col-6">
            <!-- Prawa strona okna, jest tam formularz do dodawania wiadomości oraz wyświetlanie wiadomości -->
            <div class="TwittePost">
                <!-- Sekcja dodawania wiadomości -->
                <section>
                    <?php
                        include 'connect.php';
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT id, userview, username, dates, email, pass, img, reg_date FROM users WHERE $id_user = id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                    ?>
                        <!-- Edycja danych o użytkowniku -->
                        <h3>Twój profil</h3>
                        <br>
                        <form action="edit.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nazwa wyświetlana</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="userview" value="<?php echo $row['userview']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Twój nick</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="username" value="<?php echo $row['username']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Data urodzenia</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="dates" value="<?php echo $row['dates']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Adres e-mail</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="<?php echo $row['email']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Hasło</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="pass" value="<?php echo $row['pass']; ?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Edytuj</button>
                            </div>
                        </form>
                        <br>
                        <!-- Dodawanie zdjęcia profilowego -->
                        <h3>Zdjęcie profilowe</h3>
                        <br>
                        <form action="upload.php" method="POST" enctype="multipart/form-data"> 
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Dodaj zdjęcie</label>
                                <input type="file" class="form-control" id="exampleFormControlInput1" name="img" value="<?php echo $row['img']; ?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Prześlij zdjęcie</button>
                            </div>
                        </form>

                    <?php
                            }
                        } else {
                        echo "0 results";
                        }
                                $conn->close();
                    ?>
                </section>
                
                <!-- Koniec sekcji postów -->
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?> 