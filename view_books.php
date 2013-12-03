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
	<title>View Books</title>
</head>

<body>
	<div id="wrap">
		<?php
			include('directory.php');
		?>
		
		<div id="main">
			<?php
				// Connect to Database
				include('access_database.php');

				// $username = (string) $_POST['username'];
				// $password = (string) $_POST['password'];

				$userQuery = "SELECT * FROM books";
				$userStmt = $db->query($userQuery);

				// $userStmt->bind_param("s",);
				// $userStmt->bind_result($password);
				// $userStmt->execute();
				// $userStmt->fetch();

				$num_rows = $userStmt->num_rows;
				if ($num_rows == 0) {
					echo "no books";
				} else {
					echo "<table>";

					for ($i=0; $i < $num_rows; $i++) {
						$row = $userStmt->fetch_assoc();

						echo '<tr><td>'.$row['isbn'].'</td><td>'.'<a href="book_view.php?isbn='.$row['isbn'].'">'.$row['title'].'</a>'.'</td><td>'.$row['author_first_name'].'</td><td>'.$row['author_last_name'].'</td><td><input type="submit" value="Remove"></td><input type ="hidden" name="isbn" value="'.$row['isbn'].'"></tr>';
					}

					echo "</table>";
				}
			?>
		</div>
</body>

</html>