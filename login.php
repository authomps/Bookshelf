<?php
	session_start();
	$error = $_SESSION['error'];
	session_destroy();
?>
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

	// Get the entries from the menu database
	// $query = "select * from menu;";
	// $menu = $db->query($query);
	// $interns = array();
	// // Display menu from database
	// for($i=0; $i < $menu->num_rows; $i++) {
	// 	$row = $menu->fetch_assoc();
	// 	$temp = array($row['name'], $row['price']);
	// 	array_push($interns, $temp);
	// }

	// $menu->free();
	// $db->close();
?>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="bookshelf.css" />
	<title>Login</title>
</head>

<form action="process_user_login.php" method="post">

<body>
	<div id="wrap">
		<div id="header"></div>
		
		<div id="main">
			Username: <input type="text" name="username"><br>
			Password: <input type="password" name="password"><br>
			<?php
				echo $error;
			?>
			<input type="submit" value="Submit"> 
			<br>
			<button type="button" onclick="location.href='create_new_user.php'">Create New User</button>
		</div>
</body>

</form>

</html>