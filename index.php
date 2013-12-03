<?php
	session_start();
	if(isset($_SESSION['error'])) {
		$error = $_SESSION['error'];
	}
	session_destroy();
?>
<link href='http://fonts.googleapis.com/css?family=Yellowtail|Great+Vibes|Italianno' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oldenburg|Monsieur+La+Doulaise|Open+Sans+Condensed:300|Hammersmith+One|Six+Caps|Yanone+Kaffeesatz|Oswald' rel='stylesheet' type='text/css'>
<!--
	Team Project 2
	Description: Bookshelf Intermediate 2
	Date: 11/12/13
	@author Alexander Broom, Nick Coats, Austin Thompson
-->

<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bookshelf.css" />
	<title>The Bookshelf - Login</title>
</head>

<body>
		<div id="login">
			<p id="login_title">The Bookshelf</p>
			<form action="process_user_login.php" method="post"><table align="center">
				<caption id="logon">User Login</caption>
				<?php
					if (!empty($error)) {
						echo '<tr><td colspan="2"><p class="error">'.$error.'</p></td></tr>';
					}
				?>
				<tr><td><label>Username:</label></td><td><input type="text" name="username"></td></tr>
				<tr><td><label>Password:</label></td><td><input type="password" name="password"></td></tr>
				<tr><td colspan="2" align="center"><input type="submit" value="Submit"><button type="button" onclick="location.href='create_new_user.php'">Create New User</button></td></tr>
			</table></form>
		</div>
</body>
</html>
