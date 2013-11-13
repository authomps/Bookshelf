<?php
	// Start session
	session_start();
	$username = $_SESSION['username'];

	// Connect to Database
	include('access_database.php');

	$checkQuery = "SELECT * FROM friends WHERE user='".$username."' AND friend='".$_POST['friend']."'";

	// Check if relationship exists
	if ($db->query($checkQuery)->num_rows != 0) {
		echo "<p>Friend already added!</p>";
	} else {
		// Add friend to database
		$addQuery = "INSERT INTO friends VALUES(NULL,'".$username."','".$_POST['friend']."')";
		$addStmt = $db->query($addQuery);

		echo "<p>".$_POST['friend']." added as a friend!</p>";
	}

	include('directory.php');
?>