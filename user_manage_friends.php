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
	<title>Manage Friends</title>
</head>

<body>
	<div id="wrap">
		<?php
			include('directory.php');
			include('friends_list.php');
		?>
		
		<div id="main">
			<h1>Manage Friends</h1>
			<?php
				// Connect to Database
				include('access_database.php');

				// List friends
				$friendQuery = "SELECT username, first_name, last_name FROM users JOIN friends WHERE username = friend AND user = '".$username."'";
				$friendStmt = $db->query($friendQuery);

				$friends;
				$num_rows = $friendStmt->num_rows;
				if ($num_rows == 0) {
					echo "You have no friends.";
				} else {
					echo "<table>";
					echo '<th>Username</th><th colspan="2">Name</th><th></th>';

					for ($i=0; $i < $num_rows; $i++) {
						$row = $friendStmt->fetch_assoc();
						$friends[] = "'".$row['username']."'";
						echo '<form action="process_user_remove_friend.php" method="post">';
						echo '<tr><td>'.$row['username'].'</td><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td><td><input type="submit" value="Remove"></td><input type ="hidden" name="friend_name" value="'.$row['username'].'"></tr>';
						echo '</form>';
					}

					echo "</table>";
				}
			?>
			<button type="button" onclick="location.href='user_add_friend.php'">Add Friends</button><br>
		</div>
		<div style="clear: both; background-color: black"></div>
	</div>
</body>

</html>