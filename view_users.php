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
	<title>View Users</title>
</head>

<body>
	<div id="wrap">
		<div id="header"></div>
		
		<div id="main">
			<?php
				// Connect to Database
				include('access_database.php');

				// $username = (string) $_POST['username'];
				// $password = (string) $_POST['password'];

				$userQuery = "SELECT * FROM users";
				$userStmt = $db->query($userQuery);

				// $userStmt->bind_param("s",);
				// $userStmt->bind_result($password);
				// $userStmt->execute();
				// $userStmt->fetch();

				$num_rows = $userStmt->num_rows;
				if ($num_rows == 0) {
					echo "no users";
				} else {
					echo "<table>";

					for ($i=0; $i < $num_rows; $i++) {
						$row = $userStmt->fetch_assoc();

						echo '<tr><td>'.$row['username'].'</td><td>'.$row['password'].'</td><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td></tr>';
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
				
				include('directory.php');
			?>
		</div>
</body>

</html>