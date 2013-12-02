<div id="friends">

	<h2 align="center">Friends</h2>
	<?php
		// Connect to Database
		include('access_database.php');
		// List friends
		$friendQuery = "SELECT username, first_name, last_name FROM users JOIN friends WHERE username = friend AND user = '".$username."' ORDER BY last_name";
		$friendStmt = $db->query($friendQuery);

		$friends;
		$num_rows = $friendStmt->num_rows;
		if ($num_rows == 0) {
			echo "You have no friends.";
		} else {
			echo '<table class="friends_list">';

			for ($i=0; $i < $num_rows; $i++) {
				$row = $friendStmt->fetch_assoc();
				$friends[] = "'".$row['username']."'";
				// echo '<form action="friend_homepage.php" method="post">';
				echo '<tr><td>'.'<a href="friend_homepage.php?friend_name='.$row['username'].'">'.$row['first_name'].' '.$row['last_name'].'</a>'.'</td></tr>';
				// echo '<tr><td><input type="submit" value="'.$row['first_name'].' '.$row['last_name'].'"></td><input type ="hidden" name="friend_name" value="'.$row['username'].'">';
				// echo '</form>';
			}

			echo "</table>";
		}
	?>
</div>
