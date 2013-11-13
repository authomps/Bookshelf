<?php
	// Connect to Database
	include('access_database.php');

	// Grab data from form
	$username = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	
	$first_name = $_POST['first_name'];
	if(empty($first_name))
		$first_name = NULL;
	
	$last_name = $_POST['last_name'];
	if(empty($last_name))
		$last_name = NULL;

	// Error checking

	// Query database for users matching username
	$userQuery = "SELECT * FROM users WHERE username = '".$username."'";
	$userStmt = $db->query($userQuery);

	// If no matching user, return to login screen with error message
	if ($userStmt->num_rows != 0) {
		session_start();
		$_SESSION['error'] = "Username already taken.";
		$_SESSION['first_name'] = $first_name;
		$_SESSION['last_name'] = $last_name;
		header('Location: create_new_user.php');
		return;
	}

	// Check if passwords match

	if ($password1 != $password2) {
		session_start();
		$_SESSION['error'] = "Passwords do not match.";
		$_SESSION['username'] = $username;
		$_SESSION['first_name'] = $first_name;
		$_SESSION['last_name'] = $last_name;
		header('Location: create_new_user.php');
		return;
	}

	// Create query
	$query = "INSERT INTO users VALUES(?, ?, NULL, ?, ?);";
	$stmt = $db->prepare($query);
	$stmt->bind_param("ssss", $username, $password1, $first_name, $last_name);

	// If failed to execute, return to create new user screen with error message
	if (!$stmt->execute()) {
		$db->close();
		session_start();
		$_SESSION['error'] = "Could not create new user.";
		header('Location: create_new_user.php');
	}
	// Otherwise, go to new user's homepage
	else {
		$db->close();
		session_start();
		$_SESSION['username'] = $username;
		header('Location: user_homepage.php');
	}
?>
