<?php
	// Connect to Database
	include('access_database.php');

	// Query database for users matching username and password
	$userQuery = "SELECT * FROM users WHERE username = '".$_POST['username']."' AND password='".$_POST['password']."'";
	$userStmt = $db->query($userQuery);

	// If no matching user, return to login screen with error message
	if ($userStmt->num_rows == 0) {
		session_start();
		$_SESSION['error'] = "Invalid username or password";
		header("Location: index.php");
	}
	// Go to homepage with user logged in
	else {
		session_start();
		$_SESSION['username'] = $_POST['username'];
		header("Location: user_homepage.php");
	}
?>
