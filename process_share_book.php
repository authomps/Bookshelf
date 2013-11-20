<?php
	session_start();

	// Connect to Database
	include('access_database.php');

	// Grab data from form
	$isbn = $_POST['isbn'];
	$title = $_POST['title'];
	$author_first_name = $_POST['author_first_name'];
	$author_last_name = $_POST['author_last_name'];

	// Check is book exists

	// Query database for books matching isbn
	$bookQuery = "SELECT * FROM books WHERE isbn = '".$isbn."'";
	$bookStmt = $db->query($bookQuery);

	// If no matching book, return to add book screen with error message
	if ($bookStmt->num_rows != 0) {
		$_SESSION['error'] = "Book already added.";
		header('Location: share_book.php');
		return;
	}

	// Create query
	$query = "INSERT INTO books VALUES(?, ?, ?, ?);";
	$stmt = $db->prepare($query);
	$stmt->bind_param("ssss", $isbn, $title, $author_first_name, $author_last_name);

	// If failed to execute, return to add book page with error message
	if (!$stmt->execute()) {
		$db->close();
		$_SESSION['error'] = "Could not create new book.";
		header('Location: share_book.php');
	}
	else {
		$db->close();
		header('Location: user_add_book.php');
	}
?>
