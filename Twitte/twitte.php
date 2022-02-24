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
?>
<!-- Główne okno siatki -->
<div class="container-md">
    <div class="row justify-content-center">
        <div class="col-3">
            <!-- Lewa strona okna, jest tam menu oraz informacje o użytkowniku -->
            <div class="TwitteProfile">
                <?php
                    echo "<p>Witaj ".$_SESSION['userview'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
                ?>

                <aside>
                    <nav>
                        Menu 
                    </nav>
                </aside>
            </div>
        </div>

        <div class="col-6">
            <!-- Prawa strona okna, jest tam formularz do dodawania wiadomości oraz wyświetlanie wiadomości -->
            <div class="TwittePost">
                <!-- Sekcja dodawania wiadomości -->
                <section>
                    <form action="addTwitte.php" method="post">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Wpisz tekst wiadomości..." name="posttext"></textarea><br>
                        <button type="submit" class="btn btn-primary mb-3">Wyślij</button>
                    </form>
                </section>
                <!-- Koniec sekcji wiadomości -->

                <!-- Sekcja wyświetlania postów -->
                <section>
                    <div class="container">
                        <?php
                            $servername = "localhost"; //Nazwa serwera
                            $username = "root"; //Nazwa użytkownika
                            $password = ""; //Hasło do konta użytkownika
                            $dbname = "twitte"; //Nazwa bazy danych

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT homepage.id, homepage.posttext, homepage.userview, homepage.username, homepage.heart, homepage.add_date, comments.comment_id, comments.comment_text, comments.userview, comments.username, comments.reg_date FROM homepage, comments";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                        ?>
                    
                        <div class="row">
                            <div class="col">
                                <span style="font-weight: bold;"><?php echo $row["homepage.userview"]; ?></span>
                                <?php echo "@".$row["username"]." - "; ?>
                                <?php echo $row["add_date"]; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="lh-sm"><?php echo $row["posttext"]; ?></p>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col"> 
                                <!-- Formularz do dowania komentarzu -->
                                <form action="addComment.php" method="POST" class="row g-2">
                                    <div class="col-10">
                                        <input type="text" class="form-control form-control-sm" name="comment" placeholder="Wpisz swój komentarz..." aria-label=".form-control-sm example"><br>
                                        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                        <input type="hidden" name="userviewcom" value="<?php echo $row["userview"]; ?>">
                                        <input type="hidden" name="usernamecom" value="<?php echo $row["username"]; ?>">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Skomentuj</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                                <div class="row">
                                    <div class="col">
                                        <span style="font-weight: bold;"><?php echo $row["userview"]; ?></span>
                                        <?php echo "@".$row["username"]." - "; ?>
                                        <?php echo $row["reg_date"]; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="lh-sm">
                                            <?php 
                                               
                                                echo $row["comment_text"];
                                                
                                            ?>
                                        </p>
                                    </div>
                                </div>
                        <?php
                        }
                            } else {
                            echo "0 results";
                            }
                            $conn->close();
                        ?>
                    </div>
                </section>
                <!-- Koniec sekcji postów -->
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?> 