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
	<link rel="stylesheet" type="text/css" href="bookshelf.css" />
	<title>Manage Friends</title>
</head>

<body>
	<div id="wrap">
		<div id="header"></div>
		
		<div id="main">
			<?php
				// Connect to Database
				include('access_database.php');

				// List friends
				echo "friends:<br>";
				$friendQuery = "SELECT username, first_name, last_name FROM users JOIN friends WHERE username = friend AND user = '".$username."'";
				$friendStmt = $db->query($friendQuery);

				$friends;
				$num_rows = $friendStmt->num_rows;
				if ($num_rows == 0) {
					echo "no friends :(<br>";
				} else {
					echo "<table>";

					for ($i=0; $i < $num_rows; $i++) {
						$row = $friendStmt->fetch_assoc();
						$friends[] = "'".$row['username']."'";
						echo '<tr><td>'.$row['username'].'</td><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td></tr>';
					}

					echo "</table>";
				}


				// List not friends
				echo "<br><br>not friends:<br>";


				$notFriendQuery = "SELECT username, first_name, last_name FROM users WHERE NOT username in (".join(',',$friends).") AND username != '".$username."'";
				$notFriendStmt = $db->query($notFriendQuery);

				$num_rows = $notFriendStmt->num_rows;
				if ($num_rows == 0) {
					echo "too many friends :(<br>";
				} else {
					echo "<table>";

					for ($i=0; $i < $num_rows; $i++) {
						$row = $notFriendStmt->fetch_assoc();

						echo '<tr><td>'.$row['username'].'</td><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td></tr>';
					}

					echo "</table>";
				}
				
				include('directory.php');
			?>
		</div>
</body>

</html>