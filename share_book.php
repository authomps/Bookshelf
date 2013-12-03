<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		$_SESSION['error'] = "You must be logged in to view this page.";
		header('Location: index.php');
		return;
	}
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
			<h1>Add A Book</h1>
			<?php
				if (!empty($error)) {
					echo $error;
				}
			?>
			<form action="process_share_book.php" method="post"><table>
				<tr><td><label>ISBN:</label></td><td><input type="text" name="isbn" pattern=".{10,13}" required placeholder="isbn10 or isbn13"></td></tr>
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
