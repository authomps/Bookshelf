<?php
	session_start();
	if(!isset($_SESSION['username'])) {
		$_SESSION['error'] = "You must be logged in to view this page.";
		header('Location: index.php');
		return;
	}
	$username = $_SESSION['username'];
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
				include('access_database.php');
				$booksQuery = "SELECT isbn, title, author_first_name, author_last_name FROM books JOIN usersBooks WHERE isbn = book AND user = '".$username."'";
				$booksStmt = $db->query($booksQuery);

				$books;
				$num_rows = $booksStmt->num_rows;
				for ($i=0; $i < $num_rows; $i++) {
					$row = $booksStmt->fetch_assoc();
					$books[] = "'".$row['isbn']."'";
				}

				if (sizeof($books) == 0) {
					$notOwnedBookQuery = "SELECT isbn, title, author_first_name, author_last_name FROM books";
				} else {
					$notOwnedBookQuery = "SELECT isbn, title, author_first_name, author_last_name FROM books WHERE NOT isbn in (".join(',',$books).")";
				}
				// list books
				$notOwnedBookStmt = $db->query($notOwnedBookQuery);

				$num_rows = $notOwnedBookStmt->num_rows;
				if ($num_rows == 0) {
					echo "<br>No books to display<br>";
				} else {
					echo "<table>";
					for ($i=0; $i < $num_rows; $i++) {
						$row = $notOwnedBookStmt->fetch_assoc();
						echo '<form action="process_user_add_book.php" method="post">';
						echo '<tr><td>'.$row['isbn'].'</td><td>'.'<a href="book_view.php?isbn='.$row['isbn'].'">'.$row['title'].'</a>'.'</td><td>'.$row['author_first_name'].'</td><td>'.$row['author_last_name'].'</td><td><input type="submit" value="Add"></td><input type ="hidden" name="isbn" value="'.$row['isbn'].'"></tr>';
						echo '</form>';

					}
					echo "</table>";
				}
			?>
			<button type="button" onclick="location.href='user_homepage.php'">Return</button>
		</div>
		<div style="clear: both; background-color: black"></div>
	</div>
</body>
</html>
