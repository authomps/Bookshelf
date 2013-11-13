<?php
	session_start();
	$error = $_SESSION['error'];
	session_destroy();
?>

<!--
	Team Project 2
	Description: Bookshelf Intermediate 2
	Date: 11/12/13
	@author Alexander Broom, Nick Coats, Austin Thompson
-->

<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="bookshelf.css" />
	<title>The Bookshelf - Login</title>
</head>

<body>
	<div id="wrap">
		<div id="header">
		</div>
		
		<div id="main">
			<form action="process_user_login.php" method="post"><fieldset overflow="hidden"><table>
				<?php
					if (!empty($error)) {
						echo '<tr><td colspan="2"><p class="error">'.$error.'</p></td></tr>';
					}
				?>
				<tr><td><label>Username:</label></td><td><input type="text" name="username"></td></tr>
				<tr><td><label>Password:</label></td><td><input type="password" name="password"></td></tr>
				<tr><td colspan="2" align="center"><input type="submit" value="Submit"></td></tr>
			</table></fieldset></form>
			<br>
			<button type="button" onclick="location.href='create_new_user.php'">Create New User</button>
		</div>
</body>
</html>
