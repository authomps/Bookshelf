<?php
	// Connect to database
	@ $db = new mysqli('localhost', 'team15', 'watermelon', 'team15');
	if ( mysqli_connect_errno() ) {
		echo 'Error connecting to bookshelf database';
		exit;
	}
?>
