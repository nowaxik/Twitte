<?php

	session_start();
	$updateID = $_SESSION['id'];
	
	include 'connect.php';

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	  }
	  
	$sql = "UPDATE users SET status='offline' WHERE id=$updateID";
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	  } else {
		echo "Error updating record: " . $conn->error;
	  }

	session_destroy();
	
	header('Location: ../index.php');

?>