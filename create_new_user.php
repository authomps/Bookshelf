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
	<title>Create New User</title>
</head>



<body>
	<div id="wrap">
		<div id="header"></div>
		
		<div id="main">
			<form action="process_new_user.php" method="post">
				Username: <input type="text" name="username" required><br>
				Password: <input type="password" name="password1" required><br>
				Confirm Password: <input type="password" name="password2" required><br>
				First Name: <input type="text" name="first_name"><br>
				Last Name: <input type="text" name="last_name"><br>
				<input type="submit" value="Submit"> 
			</form>
		</div>
</body>



</html>