<?php
	// Start session
	session_start();
	$username = $_SESSION['username'];

	// Connect to Database
	include('access_database.php');

	$checkQuery = "SELECT * FROM usersBooks WHERE user='".$username."' AND book='".$_POST['isbn']."'";

	// Check if relationship exists
	if ($db->query($checkQuery)->num_rows != 0) {
		echo "<p>Book already added!</p>";
	} else {
		// Add book to database
		$addQuery = "INSERT INTO usersBooks VALUES(NULL,'".$username."','".$_POST['isbn']."')";
		$addStmt = $db->query($addQuery);

		echo "<p>".$_POST['isbn']." added as a book!</p>";
	}

	include('directory.php');
?>
