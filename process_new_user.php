<!--
	Team Project 2
	Description: Bookshelf Intermediate 2
	Date: 11/12/13
	@author Austin Thompson, Alex Broom, Nick Coats
-->

<!DOCTYPE html>
<?php
	// Connect to menu database
	@ $db = new mysqli('localhost', 'root', 'indy323', 'bookshelf');
	if ( mysqli_connect_errno() ) {
		echo 'Error connecting to bookshelf database';
		exit;
	}

	$username = (string) $_POST['username'];
	$password1 = (string) $_POST['password1'];
	$password2 = (string) $_POST['password2'];
	
	$first_name = (string) $_POST['first_name'];
	if(empty($first_name))
		$first_name = NULL;
	
	$last_name = (string) $_POST['last_name'];
	if(empty($last_name))
		$last_name = NULL;

	// Get the entries from the menu database
	$query = "INSERT INTO users VALUES(?, ?, NULL, ?, ?);";
	$stmt = $db->prepare($query);
	$stmt->bind_param("ssss", $username, $password1, $first_name, $last_name);
	$stmt->execute();
	
	$db->close();
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="bookshelf.css" />
	<title>Process New User</title>
</head>


<body>
	<div id="wrap">
		<div id="header"></div>
		
		<div id="main">
			<button type="button" onclick="location.href='view_books.php'">View Books</button>
			<button type="button" onclick="location.href='view_users.php'">View Users</button>
		</div>
</body>
</html>