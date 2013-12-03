<?php
	// Start session
	session_start();
	$username = $_SESSION['username'];
	$isbn = $_POST['isbn'];

	// Connect to Database
	include('access_database.php');

	if (isset($_POST['remove'])) {
		$delete = "DELETE FROM usersBooks WHERE user='".$username."' AND book='".$isbn."'";
		$db->query($delete);
	} else {
		$update = "UPDATE users SET current_book='".$isbn."' WHERE username='".$username."'";
		$db->query($update);
	}

	header('Location: user_homepage.php');
?>
