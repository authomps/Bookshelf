<?php
	// Connect to menu database
	@ $db = new mysqli('localhost', 'root', 'indy323', 'bookshelf');
	if ( mysqli_connect_errno() ) {
		echo 'Error connecting to bookshelf database';
		exit;
	}

	// $username = (string) $_POST['username'];
	// $password = (string) $_POST['password'];

	$userQuery = "SELECT * FROM users WHERE username = '".$_POST['username']."' AND password='".$_POST['password']."'";
	$userStmt = $db->query($userQuery);

	// $userStmt->bind_param("s",);
	// $userStmt->bind_result($password);
	// $userStmt->execute();
	// $userStmt->fetch();

	if ($userStmt->num_rows == 0) {
		session_start();
		$_SESSION['error'] = "No user try again";
		header("Location: login.php");
	} else {
		session_start();
		$_SESSION['username'] = $_POST['username'];
		header("Location: user_homepage.php");
		// echo "You have logged in  as ".$_SESSION['username']."<br>";
		// echo '<button type="button" onclick="location.href=\'view_books.php\'">View Books</button>';
		// echo '<button type="button" onclick="location.href=\'view_users.php\'">View Users</button>';
	}
?>
<!--
	Team Project 2
	Description: Bookshelf Intermediate 2
	Date: 11/12/13
	@author Austin Thompson, Alex Broom, Nick Coats
-->
<!-- <!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="bookshelf.css" />
	<title>Login</title>
</head>

<form action="process_user.php" method="post">

<body>
	<div id="wrap">
		<div id="header"></div>
		
		<div id="main">
			<?php
				// // Connect to menu database
				// @ $db = new mysqli('localhost', 'root', 'indy323', 'bookshelf');
				// if ( mysqli_connect_errno() ) {
				// 	echo 'Error connecting to bookshelf database';
				// 	exit;
				// }

				// // $username = (string) $_POST['username'];
				// // $password = (string) $_POST['password'];

				// $userQuery = "SELECT * FROM users WHERE username = '".$_POST['username']."' AND password='".$_POST['password']."'";
				// $userStmt = $db->query($userQuery);

				// // $userStmt->bind_param("s",);
				// // $userStmt->bind_result($password);
				// // $userStmt->execute();
				// // $userStmt->fetch();

				// if ($userStmt->num_rows == 0) {
				// 	session_destroy();
				// 	header("Location: login.php");
				// } else {
				// 	$_SESSION['username'] = $_POST['username'];
				// 	// header("Location: user_homepage.php");
				// 	echo "You have logged in  as ".$_SESSION['username']."<br>";
				// 	echo '<button type="button" onclick="location.href=\'view_books.php\'">View Books</button>';
				// 	echo '<button type="button" onclick="location.href=\'view_users.php\'">View Users</button>';
				// }

				// // Get the entries from the menu database
				// // $query = "select * from menu;";
				// // $menu = $db->query($query);
				// // $interns = array();
				// // // Display menu from database
				// // for($i=0; $i < $menu->num_rows; $i++) {
				// // 	$row = $menu->fetch_assoc();
				// // 	$temp = array($row['name'], $row['price']);
				// // 	array_push($interns, $temp);
				// // }

				// // $menu->free();
				// // $db->close();
			?>
		</div>
</body>

</form>

</html> -->