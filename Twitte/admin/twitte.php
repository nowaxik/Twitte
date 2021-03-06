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
include 'function.php';
$user_id = $_SESSION['id'];
$user_Name = $_SESSION['username'];
?>
<!-- Główne okno siatki -->
<div class="container-md">
    <div class="row justify-content-center">
        <div class="col-3">
            <!-- Lewa strona okna, jest tam menu oraz informacje o użytkowniku -->
            <div class="TwitteProfile">
                <?php
                    echo "Witaj <b>".$_SESSION['userview'].'!</b>';
                ?>
                <br>
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
                <br>
                <small>
                    <?php
                        //Funkcja wyświetlających zarejestrowanych użytkowników serwisu
                        ShowUsers();
                    ?>
                </small>
                <!-- Koniec Menu -->
            </div>
        </div>

        <div class="col-6">
            <!-- Prawa strona okna, jest tam formularz do dodawania wiadomości oraz wyświetlanie wiadomości -->
            <div class="TwittePost">
                <!-- Sekcja dodawania wiadomości -->
                <h3><img src="icon/twitter32.png"> Home Page</h3><br>
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
                            // Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT post_id, posttext, userview, username, heart, add_date FROM homepage";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                
                        ?>
                            <?php 
                                $id = $row['post_id']; 
                            ?>
                            <hr>
                        <div class="row">
                            <div class="col">
                                <small>
                                    <?php //ShortImage() ?>
                                    <span style="font-weight: bold;"><?php echo $row["userview"]; ?></span>
                                    <?php echo "@".$row["username"]." - "; ?>
                                    <?php echo $row["add_date"]; ?>
                                        <!-- Rozwijany przycisk usuwania i edycji postu -->
                                        <div class="btn-group">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Edit
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="deletePost.php?id=<?php echo $id; ?>">Usuń</a></li>
                                                <li><a class="dropdown-item disabled" href="#">Edytuj</a></li>
                                            </ul>
                                        </div>
                                   <!-- <a class="imgDeletePost" href="deletePost.php?id=<?php echo $id; ?>"><img src="icon/x.png"></a> -->
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <small>
                                    <p class="lh-sm"><?php echo $row["posttext"]; ?></p>
                                </small>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col"> 
                                <!-- Formularz do dowania komentarzu -->
                                <form action="addComment.php" method="POST" class="row g-2">
                                    <div class="col-10">
                                        <input type="text" class="form-control form-control-sm" name="comment" placeholder="Wpisz swój komentarz..." aria-label=".form-control-sm example"><br>
                                        <input type="hidden" name="id" value="<?php echo $row["post_id"]; ?>">
                                        <input type="hidden" name="userviewcom" value="<?php echo $row["userview"]; ?>">
                                        <input type="hidden" name="usernamecom" value="<?php echo $row["username"]; ?>">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Skomentuj</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                            <?php
                                $sql = "SELECT id, comment_id, comment_text, userview, username, reg_date FROM comments WHERE $id=comment_id";
                                $polaczenie = $conn->query($sql);
    
                                if ($polaczenie->num_rows > 0) {
                                // output data of each row
                                while($com = $polaczenie->fetch_assoc()) {
                                    $comm_id = $com["id"];
                            ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <small>
                                            <span style="font-weight: bold;"><?php echo $com["userview"]; ?></span>
                                            <?php echo "@".$com["username"]." - "; ?>
                                            <?php echo $com["reg_date"]; ?>
                                            <a class="imgDeleteComment" href="deleteComment.php?id=<?php echo $comm_id; ?>">
                                                <img src="icon/x.png">
                                            </a>
                                        </small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="commentView">
                                            <p class="commentText">
                                                <small>
                                                    <?php 
                                                        if ($id == $com['comment_id'])
                                                        {
                                                            echo $com["comment_text"] ;
                                                        }
                                                    ?>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                                }
                            }
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