<?php
	// Start session
	session_start();
	$username = $_SESSION['username'];

	// Connect to Database
	include('access_database.php');

	$checkQuery = "SELECT * FROM friends WHERE user='".$username."' AND friend='".$_POST['friend_name']."'";

	// Check if relationship exists
	if ($db->query($checkQuery)->num_rows != 0) {
		include "directory.php";
		echo "<title>Error</title>";
		echo "<p>Friend already added!</p>";
		echo '<button type="button" onclick="location.href=\'user_add_friend.php\'">Go Back</button><br>';
	} else if ($username == $_POST['friend_name']) {
		include "directory.php";
		echo "<title>Error</title>";
		echo "<p>You can't add yourself.</p>";
		echo '<button type="button" onclick="location.href=\'user_add_friend.php\'">Go Back</button><br>';
	} else {
		// Add friend to database
		$addQuery = "INSERT INTO friends VALUES(NULL,'".$username."','".$_POST['friend_name']."')";
		$addStmt = $db->query($addQuery);
		header('Location: user_add_friend.php');
	}

?>