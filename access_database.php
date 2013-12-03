<?php
	// Connect to database
	@ $db = new mysqli('127.0.0.1', 'root', 'indy323', 'team15');
	if ( mysqli_connect_errno() ) {
		echo 'Error connecting to bookshelf database';
		exit;
	}
?>
