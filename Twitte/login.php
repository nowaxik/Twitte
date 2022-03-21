<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['pass'])))
	{
		header('Location: index.php');
		exit();
	}

	require_once "admin/connect.php";

	$polaczenie = @new mysqli($servername, $username, $password, $dbname);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['login'];
		$haslo = $_POST['pass'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");


		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE username='%s' AND pass='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
				$_SESSION['username'] = $wiersz['username'];
				$_SESSION['userview'] = $wiersz['userview'];
				$_SESSION['email'] = $wiersz['email'];
				$_SESSION['reg_data'] = $wiersz['reg_data'];
				$_SESSION['img'] = $wiersz['img'];
				$updateID = $_SESSION['id'];
				
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				  }
				  
				$sql = "UPDATE users SET status='online' WHERE id=$updateID";
				if ($conn->query($sql) === TRUE) {
					echo "Record updated successfully";
				  } else {
					echo "Error updating record: " . $conn->error;
				  }

				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: admin/twitte.php');

				
				
			} else {
				
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>