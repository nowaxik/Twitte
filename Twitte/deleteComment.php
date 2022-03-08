<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>

<?php

include 'connect.php';
$id = trim($_GET['id']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  // sql to delete a record
  $sql = "DELETE FROM comments WHERE id=$id";
  
  if ($conn->query($sql) === TRUE) {
    header('Location: twitte.php');
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  
  $conn->close();

?>