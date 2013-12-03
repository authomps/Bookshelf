<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		$_SESSION['error'] = "You must be logged in to view this page.";
		header('Location: index.php');
		return;
	}
	$username = $_SESSION['username'];
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
	<title>User Homepage</title>
</head>


<body>
	<div id="wrap">
		<?php
			include('directory.php');
			include('friends_list.php');
		?>

		<div id="main">
			<?php
				include('access_database.php');

				// User's name and username
				$nameQuery = "SELECT first_name, last_name, current_book FROM users WHERE username = '".$username."'";
				$nameInfo = $db->query($nameQuery);
				$row = $nameInfo->fetch_assoc();
				$name = $row['first_name']." ".$row['last_name'];
				echo '<h1 id="user_profile_name">'.$name." (".$username.")</h1>";

				// Current book
				if (!is_null($row['current_book'])) {
					$bookQuery = "SELECT title, author_first_name, author_last_name FROM books where isbn = '".$row['current_book']."'";
					$bookInfo = $db->query($bookQuery);
					$row2 = $bookInfo->fetch_assoc();
					$book = $row2['title']." by ".$row2['author_first_name']." ".$row2['author_last_name'];
					echo '<p id="user_currently_reading"> is currently reading <a href="book_view.php?isbn='.$row['current_book'].'">'.$book.".</a></p>";
				} else {
					echo '<p id="user_currently_reading"> is currently reading nothing. </p>';
				}

				// list books
				echo "<p>".$row['first_name']."'s books:</p>";
				$bookQuery = "SELECT isbn, title, author_first_name, author_last_name FROM books JOIN usersBooks WHERE isbn = book AND user = '".$username."'";
				$bookStmt = $db->query($bookQuery);
				$num_rows = $bookStmt->num_rows;
				if ($num_rows == 0) {
					echo "<br>You have no books<br>";
				} else {
					echo "<table>";
					echo '<tr><th>ISBN</th><th>Title</th><th>Author</th><th/><th/></tr>';
					for ($i=0; $i < $num_rows; $i++) {
						$row = $bookStmt->fetch_assoc();
						echo '<form action="process_user_remove_book.php" method="post">';
						echo '<tr><td>'.$row['isbn'].'</td><td>'.'<a href="book_view.php?isbn='.$row['isbn'].'">'.$row['title'].'</a>'.'</td><td>'.$row['author_first_name'].' '.$row['author_last_name'].'</td><td><input type="submit" name="remove" value="Remove"></td><td><input type = "submit" name="reading" value="Read Me"></td><input type ="hidden" name="isbn" value="'.$row['isbn'].'"></tr>';
						echo '</form>';
					}

					echo "</table>";
				}
			?>
			<button type="button" onclick="location.href='user_add_book.php'">Add Book</button>
		</div>
		<div style="clear: both; background-color: black"></div>
	</div>
</body>
</html>
