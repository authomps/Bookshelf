<?php
	session_start();
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
				$nameQuery = "SELECT first_name, last_name FROM users WHERE username = '".$username."'";
				$nameInfo = $db->query($nameQuery);
				$row = $nameInfo->fetch_assoc();
				$name = $row['first_name']." ".$row['last_name'];



				// list books
				$bookQuery = "SELECT isbn, title, author_first_name, author_last_name FROM books JOIN usersBooks WHERE isbn = book AND user = '".$username."'";
				$bookStmt = $db->query($bookQuery);

				echo "<h1>".$name." (".$username.")</h1>".$row['first_name']."'s books:";

				$num_rows = $bookStmt->num_rows;
				if ($num_rows == 0) {
					echo "<br>You have no books<br>";
				} else {
					echo "<table>";
					echo '<tr><th>ISBN</th><th>Title</th><th colspan="2">Author</th><th></tr>';
					for ($i=0; $i < $num_rows; $i++) {
						$row = $bookStmt->fetch_assoc();
						echo '<form action="process_user_remove_book.php" method="post">';
						echo '<tr><td>'.$row['isbn'].'</td><td>'.'<a href="book_view.php?isbn='.$row['isbn'].'">'.$row['title'].'</a>'.'</td><td>'.$row['author_first_name'].'</td><td>'.$row['author_last_name'].'</td><td><input type="submit" value="Remove"></td><input type ="hidden" name="isbn" value="'.$row['isbn'].'"></tr>';
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
