<!-- Wyświetlenie zdjęcia profilowego -->
  <?php
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
      }

        $zdjecie = "SELECT img FROM users WHERE id=$user_id";
        $obraz = $conn->query($zdjecie);

        if ($obraz->num_rows > 0) {
        // output data of each row
        while($mno = $obraz->fetch_assoc()) {
  ?>
                            
    <img src="img/<?php echo $mno["img"]; ?>" class="imgRadius" alt="Zdjecie profilowe" width="200" height="200">

  <?php
    }
  }
  ?>
<br>
<br>
<nav class="nav flex-column">
    <a class="nav-link active" aria-current="page" href="twitte.php">Strona Główna</a>
    <a class="nav-link" href="profil.php">Profil</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="logout.php">Logout</a>
</nav>
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Napisz post
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dodaj swoją wiadomość</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="addTwitte.php" method="POST">
            <div class="modal-body">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Wpisz tekst wiadomości..." name="posttext"></textarea><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                <button type="submit" class="btn btn-primary" name="submit">Wyślij</button>
            </div>
        </form>
    </div>
  </div>
</div>