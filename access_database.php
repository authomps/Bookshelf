<?php
	// Connect to database
	@ $db = new mysqli('localhost', 'root', 'indy323', 'team15');
	if ( mysqli_connect_errno() ) {
		echo 'Error connecting to bookshelf database';
		exit;
	}
?>
