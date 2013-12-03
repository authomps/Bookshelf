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
	@author Alexander Broom, Nick Coats, Austin Thompson
-->

<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/bookshelf.css" />
	<title>Add A Friend</title>
</head>

<body>
	<div id="wrap">
		<?php
			include('directory.php');
			include('friends_list.php');
		?>
		
		<div id="main">
			<form action="process_user_add_friend.php" method="post"><table>
				<tr><td><label>Friend's Username:</label></td><td><input type="text" name="friend_name"></td></tr>
				<tr><td colspan="2" align="center"><input type="submit" value="Submit"></td></tr>
			</table></form>


		<?php
			// Connect to Database
			include('access_database.php');

			// Get friends
			$friendQuery = "SELECT username, first_name, last_name FROM users JOIN friends WHERE username = friend AND user = '".$username."'";
			$friendStmt = $db->query($friendQuery);

			$friends;
			$num_rows = $friendStmt->num_rows;
			for ($i=0; $i < $num_rows; $i++) {
				$row = $friendStmt->fetch_assoc();
				$friends[] = "'".$row['username']."'";
			}

			// List not friends
			if (sizeof($friends) == 0) {
				$notFriendQuery = "SELECT username, first_name, last_name FROM users WHERE username != '".$username."'";
			} else {
				$notFriendQuery = "SELECT username, first_name, last_name FROM users WHERE NOT username in (".join(',',$friends).") AND username != '".$username."'";
			}
			$notFriendStmt = $db->query($notFriendQuery);

			$num_rows = $notFriendStmt->num_rows;
			if ($num_rows == 0) {
				echo "Everyone is your friend<br>";
			} else {
				echo "<table>";
				echo '<th>Username</th><th colspan="2">Name</th><th></th>';
				for ($i=0; $i < $num_rows; $i++) {
					$row = $notFriendStmt->fetch_assoc();
					echo '<form action="process_user_add_friend.php" method="post">';
					echo '<tr><td>'.$row['username'].'</td><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td><td><input type="submit" value="Add"></td><input type ="hidden" name="friend_name" value="'.$row['username'].'"></tr>';
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
