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

<html>

<head>
	<link rel="stylesheet" type="text/css" href="bookshelf.css" />
	<title>Process New User</title>
</head>


<body>
	<div id="wrap">
		<div id="header"></div>
		
		<div id="main">
			<?php
				echo 'logged in as '.$username.'<br>';

				include('access_database.php');

				// list books
				$bookQuery = "SELECT isbn, title, author_first_name, author_last_name FROM books JOIN usersBooks WHERE isbn = book AND user = '".$username."'";
				$bookStmt = $db->query($bookQuery);

				echo "<br><br>".$username."'s books:";

				$num_rows = $bookStmt->num_rows;
				if ($num_rows == 0) {
					echo "<br>no books :(<br>";
				} else {
					echo "<table>";

					for ($i=0; $i < $num_rows; $i++) {
						$row = $bookStmt->fetch_assoc();
						echo '<tr><td>'.$row['isbn'].'</td><td>'.$row['title'].'</td><td>'.$row['author_first_name'].'</td><td>'.$row['author_last_name'].'</td></tr>';
					}

					echo "</table>";
				}
			?>
			<form action="process_book_to_user.php" method="post">
			<select name="isbn">
				<?php
					$bookQuery = "SELECT isbn FROM books";
					$bookStmt = $db->query($bookQuery);
					// $bookStmt->data_seek(0);
					for ($i=0; $i<$bookStmt->num_rows; $i++) {
						$row = $bookStmt->fetch_assoc();
						$isbn = stripslashes($row['isbn']); 
					    echo  '<option value = "'.$isbn.'">'.$isbn.'</option>';
					}
				?>
			</select>
			<input type="submit" value="Add book">
			</form>

			<?php

				include('directory.php');
			?>
		</div>
</body>
</html>
