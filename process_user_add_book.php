<?php
	// Start session
	session_start();
	$username = $_SESSION['username'];
	$isbn = $_POST['isbn'];

	// Connect to Database
	include('access_database.php');

	$checkQuery = "SELECT * FROM usersBooks WHERE user='".$username."' AND book='".$isbn."'";

	// Add book to database
	$addQuery = "INSERT INTO usersBooks VALUES(NULL,'".$username."','".$isbn."')";
	$addStmt = $db->query($addQuery);

	header('Location: user_add_book.php');

?>
