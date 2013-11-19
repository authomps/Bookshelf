<?php
	// Start session
	session_start();
	$username = $_SESSION['username'];
	$friend_name = $_POST['friend_name'];

	// Connect to Database
	include('access_database.php');

	$delete = "DELETE FROM friends WHERE user='".$username."' AND friend='".$friend_name."'";
	$addStmt = $db->query($delete);

	header('Location: user_manage_friends.php');

?>
