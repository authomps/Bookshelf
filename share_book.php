<?php
	session_start();
	$username = $_SESSION['username'];
	$error = $_SESSION['error'];
	$_SESSION['error'] = NULL;
?>

<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/bookshelf.css" />
	<title>Add A Book</title>
</head>

<body>
	<div id="wrap">
		<?php
			include('directory.php');
			include('friends_list.php');
		?>
		
		
		<div id="main">
			<?php
				if (!empty($error)) {
					echo $error;
				}
			?>
			<form action="process_share_book.php" method="post"><table>
				<tr><td><label>ISBN:</label></td><td><input type="text" name="isbn" pattern=".{17,17}" required placeholder="required 17 characters"></td></tr>
				<tr><td><label>Title:</label></td><td><input type="text" name="title" maxlength="50" required></td></tr>
				<tr><td><label>Author's First Name:</label></td><td><input type="text" name="author_first_name" maxlength="20" required></td></tr>
				<tr><td><label>Author's Last Name:</label></td><td><input type="text" name="author_last_name" maxlength="20" required></td></tr>
				<tr><td colspan="2" align="center"><input type="submit" value="Submit"></td></tr>
			</table></form>
		</div>
		<div style="clear: both; background-color: black"></div>
	</div>


</body>
</html>
