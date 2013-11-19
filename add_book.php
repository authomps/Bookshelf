<?php
	session_start();
	$username = $_SESSION['username'];
	$error = $_SESSION['error'];
	$_SESSION['error'] = NULL;
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
	<title>Add A Book</title>
</head>

<body>
	<div id="wrap">
		<?php
			include('directory.php');
		?>
		
		
		<div id="main">
			<?php
				if (!empty($error)) {
					echo $error;
				}
			?>
			<form action="process_add_book.php" method="post"><fieldset overflow="hidden"><table>
				<tr><td><label>ISBN:</label></td><td><input type="text" name="isbn" pattern=".{17,17}" required placeholder="required 17 characters"></td></tr>
				<tr><td><label>Title:</label></td><td><input type="text" name="title" maxlength="50" required></td></tr>
				<tr><td><label>Author's First Name:</label></td><td><input type="text" name="author_first_name" maxlength="20" required></td></tr>
				<tr><td><label>Author's Last Name:</label></td><td><input type="text" name="author_last_name" maxlength="20" required></td></tr>
				<tr><td colspan="2" align="center"><input type="submit" value="Submit"></td></tr>
			</table></fieldset></form>
		</div>


</body>
</html>
