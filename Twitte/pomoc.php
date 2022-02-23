<!-- Tutaj wyświetlają się wiadomości -->
<section class="Post">
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

                        $sql = "SELECT id, posttext, userview, username, heart, add_date FROM homepage WHERE id > 0";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                    ?>

                            <div class="container">
                            <!-- ------------------------------------ -->   
                                <div class="row">
                                        <div class="col">
                                            <span style="font-weight: bold;"><?php echo $row["userview"]; ?></span>
                                            <?php echo "@".$row["username"]." - "; ?>
                                            <?php echo $row["add_date"]; ?>
                                        </div>
                                </div>
                                <!-- ------------------------------------ -->
                                <div class="row">
                                        <div class="col">
                                            <p class="lh-sm"><?php echo $row["posttext"]; ?></p>
                                        </div>
                                </div>
                                <!-- ------------------------------------ -->
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
                                    <!-- ------------------------------------ -->   
                                <div class="row">
                                    <div class="col"> 
                                        <?php
                                                }
                                            } else {
                                            echo "0 results";
                                            }
                                                $conn->close();

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
                            

                                                $comm = "SELECT id, post_id, comment_text, userview, username, reg_date FROM comments WHERE id>0";
                                                $result = $conn->query($comm);
                            
                                                if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($rowComment = $result->fetch_assoc()) {
                                                    if($rowComment["post_id"] == $id) {
                                        ?>
                                            <!-- ------------------------------------ -->   
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <span style="font-weight: bold;"><?php echo $rowComment["userview"]; ?></span>
                                                        <?php echo "@".$rowComment["username"]." - "; ?>
                                                        <?php echo $rowComment["reg_date"]; ?>
                                                    </div>
                                                </div>
                                                <!-- ------------------------------------ -->    
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="lh-sm">
                                                            <?php 
                                                                
                                                                    echo $rowComment["comment_text"];
                                                                
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            <!-- ------------------------------------ -->   
                                            </div>            
                                        <?php
                                                }
                                            }
                                            } 
                                    
                                        ?>


                                    
                                    </div>
                                </div>
                                <!-- ------------------------------------ -->   
                            </div>
                            <hr>
                            <?php
                                
                                $conn->close();
                            ?>
                        </div>
                </section>