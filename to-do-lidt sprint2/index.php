<!DOCTYPE html>
<html>
<head>
	<title>TODOLIST DEMO</title>
</head>
<body>
	<h1>Welcome to my todolist teletubbies</h1>

<?php if(isset($_GET['login'])){
echo '<h2> no login yet</h2>' ; 
}

	?>
	<form action= "login.php" method="post">

		<label>username : </label> <input type="text" name="username">
		<label>password : </label> <input type="password" name="password"><br>
		<button type="submit" name="do">log in</button>
	</form>

</body>
</html>