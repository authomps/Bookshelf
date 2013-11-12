<?php
	session_start();
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
	<link rel="stylesheet" type="text/css" href="bookshelf.css" />
	<title>View Books</title>
</head>

<form action="process_user.php" method="post">

<body>
	<div id="wrap">
		<div id="header"></div>
		
		<div id="main">
			<?php
				// Connect to menu database
				@ $db = new mysqli('localhost', 'root', 'indy323', 'bookshelf');
				if ( mysqli_connect_errno() ) {
					echo 'Error connecting to bookshelf database';
					exit;
				}

				// $username = (string) $_POST['username'];
				// $password = (string) $_POST['password'];

				$userQuery = "SELECT * FROM books";
				$userStmt = $db->query($userQuery);

				// $userStmt->bind_param("s",);
				// $userStmt->bind_result($password);
				// $userStmt->execute();
				// $userStmt->fetch();

				echo "Logged in as ".$_SESSION['username']."<br>";

				$num_rows = $userStmt->num_rows;
				if ($num_rows == 0) {
					echo "no books";
				} else {
					echo "<table>";

					for ($i=0; $i < $num_rows; $i++) {
						$row = $userStmt->fetch_assoc();

						echo '<tr><td>'.$row['isbn'].'</td><td>'.$row['title'].'</td><td>'.$row['author_first_name'].'</td><td>'.$row['author_last_name'].'</td></tr>';
					}

					echo "</table>";
				}

				// Get the entries from the menu database
				// $query = "select * from menu;";
				// $menu = $db->query($query);
				// $interns = array();
				// // Display menu from database
				// for($i=0; $i < $menu->num_rows; $i++) {
				// 	$row = $menu->fetch_assoc();
				// 	$temp = array($row['name'], $row['price']);
				// 	array_push($interns, $temp);
				// }

				// $menu->free();
				// $db->close();
			?>
		</div>
</body>

</form>

</html>