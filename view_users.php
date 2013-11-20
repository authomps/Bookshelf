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
	<link rel="stylesheet" type="text/css" href="css/bookshelf.css" />
	<title>View Users</title>
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

				$userQuery = "SELECT * FROM users";
				$userStmt = $db->query($userQuery);

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
			?>
		</div>
</body>

</html>