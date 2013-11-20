<?php
	session_start();
	$error = $_SESSION['error'];
	$username = $_SESSION['username'];
	$first_name = $_SESSION['first_name'];
	$last_name = $_SESSION['last_name'];
	session_destroy();
?>

<!--
	Team Project 2
	Description: Bookshelf Intermediate 2
	Date: 11/12/13
	@author Austin Thompson, Alex Broom, Nick Coats
-->

<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/bookshelf.css" />
	<title>Create New User</title>
</head>

<body>		
		<div id="login">
			<form action="process_new_user.php" method="post"><table>
				<caption>Create New User</caption>
				<?php
					if (!empty($error)) {
						echo '<tr><td colspan="2"><p class="error">'.$error.'</p></td></tr>';
					}

					echo '<tr><td><label>Username:</label></td><td><input type="text" name="username"';
					if (!empty($username)) {
						echo ' value='.$username;
					}
					echo ' required></td></tr>';

					echo '<tr><td><label>Password:</label></td><td><input type="password" name="password1" required></td></tr>';
					echo '<tr><td><label>Confirm Password:</label></td><td><input type="password" name="password2" required></td></tr>';
					

					echo '<tr><td><label>First Name:</label></td><td><input type="text" name="first_name"';
					if (!empty($first_name)) {
						echo ' value='.$first_name;
					}
					echo '></td></tr>';

					echo '<tr><td><label>Last Name:</label></td><td><input type="text" name="last_name"';
					if (!empty($last_name)) {
						echo ' value='.$last_name;
					}
					echo '></td></tr>';
				?>
				<tr><td cospan="2"><input type="submit" value="Submit"></td></tr>
			</table></form>
		</div>
</body>



</html>