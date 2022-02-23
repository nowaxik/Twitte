<div class="col"> 
                                    <?php
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
                                    ?>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <span style="font-weight: bold;"><?php echo $rowComment["userview"]; ?></span>
                                                    <?php echo "@".$rowComment["username"]." - "; ?>
                                                    <?php echo $rowComment["reg_date"]; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="lh-sm">
                                                        <?php 
                                                            if($rowComment["post_id"] == $id) {
                                                                echo $rowComment["comment_text"];
                                                            }
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>            
                                    <?php
                                        }
                                        } 
                                   
                                    ?>


                                   
                                </div>