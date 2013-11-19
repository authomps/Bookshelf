<?php
	session_start();
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
	<link rel="stylesheet" type="text/css" href="bookshelf.css" />
	<title>Add A Friend</title>
</head>

<body>
	<div id="wrap">
		<?php
			include('directory.php');
		?>
		
		<div id="main">
			<form action="process_user_add_friend.php" method="post"><fieldset overflow="hidden"><table>
				<tr><td><label>Friend's Username:</label></td><td><input type="text" name="friend_name"></td></tr>
				<tr><td colspan="2" align="center"><input type="submit" value="Submit"></td></tr>
			</table></fieldset></form>
		</div>


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

				for ($i=0; $i < $num_rows; $i++) {
					$row = $notFriendStmt->fetch_assoc();
					echo '<form action="process_user_add_friend.php" method="post">';
					echo '<tr><td>'.$row['username'].'</td><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td><td><input type="submit" value="Add"></td><input type ="hidden" name="friend_name" value="'.$row['username'].'"></tr>';
					echo '</form>';
				}

				echo "</table>";
			}
		?>

</body>
</html>
