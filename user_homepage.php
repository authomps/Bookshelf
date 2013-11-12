<?php
	session_start();
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
				echo 'logged in as '.$_SESSION['username'].'<br>';
			?>
			<button type="button" onclick="location.href='view_books.php'">View Books</button>
			<button type="button" onclick="location.href='view_users.php'">View Users</button>
		</div>
</body>
</html>