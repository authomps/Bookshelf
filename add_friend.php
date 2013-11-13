<?php
	session_start();
	$username = $_SESSION['username'];
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
			<form action="process_add_friend.php" method="post"><fieldset overflow="hidden"><table>
				<tr><td><label>Friend's Username:</label></td><td><input type="text" name="friend"></td></tr>
				<tr><td colspan="2" align="center"><input type="submit" value="Submit"></td></tr>
			</table></fieldset></form>

			<?php
				include('directory.php');
			?>
		</div>


</body>
</html>
