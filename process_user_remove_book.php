<?php
	// Start session
	session_start();
	$username = $_SESSION['username'];
	$isbn = $_POST['isbn'];

	// Connect to Database
	include('access_database.php');

	$delete = "DELETE FROM usersBooks WHERE user='".$username."' AND book='".$isbn."'";
	$addStmt = $db->query($delete);

	header('Location: user_homepage.php');

?>
