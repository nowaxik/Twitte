<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
    if (isset($_POST['submit']) && isset($_FILES['img'])) {
        include "connect.php";
    
        echo "<pre>";
        print_r($_FILES['img']);
        echo "</pre>";
    
        $user_id = $_SESSION['id'];
        $img_name = $_FILES['img']['name'];
        $img_size = $_FILES['img']['size'];
        $tmp_name = $_FILES['img']['tmp_name'];
        $error = $_FILES['img']['error'];
    
        if ($error === 0) {
            if ($img_size > 125000) {
                $em = "Sorry, your file is too large.";
                header("Location: twitte.php?error=$em");
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'img/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
                    // Insert into Database
                    $sql = "UPDATE users SET img = '$new_img_name' WHERE id=$user_id";
                    mysqli_query($conn, $sql);
                    header("Location: profil.php");
                }else {
                    $em = "You can't upload files of this type";
                    header("Location: profil.php?error=$em");
                }
            }
        }else {
            $em = "unknown error occurred!";
            header("Location: profil.php?error=$em");
        }
    
    }else {
        header("Location: index.php");
    }
?>