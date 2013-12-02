<?php
	session_start();
	$username = $_SESSION['username'];
	$isbn = $_GET["isbn"];
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
	<title>View Book</title>
</head>


<body>
	<div id="wrap">
		<?php
			include('directory.php');
			include('friends_list.php');
		?>
		
		<div id="main" style="height: 646px; min-width: 500px;">
			<?php
				include('access_database.php');
				$bookQuery = "SELECT * FROM books WHERE isbn = '".$isbn."'";
				$bookInfo = $db->query($bookQuery);
				$row = $bookInfo->fetch_assoc();

				$title = $row['title'];
				$author_name = $row['author_first_name']." ".$row['author_last_name'];

				echo '<h1>'.$title.'</h1>';
				echo '<p>'.$author_name.'</p>';
				echo '<p>'.$isbn.'</p>';
				
			?>
			<script type="text/javascript" src="//www.google.com/jsapi"></script>
		    <script type="text/javascript">
		      google.load("books", "0");

		      function alertNotFound() {
		      	alert("Could not embed the book!");
		      }

		      function initialize() {
		        var viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
		        viewer.load(<?php echo "'ISBN:".$isbn."'" ?>, alertNotFound);
		      }

		      google.setOnLoadCallback(initialize);
		    </script>
		    <div id="viewerCanvas" style="width: 500px; height: 500px; padding-left: 13px;"></div>
		</div>
		<div style="clear: both; background-color: black"></div>
	</div>
</body>
</html>
