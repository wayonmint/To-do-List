<?php
session_start();
require('dbms.php');

	if(isset($_POST['do'])){

		$username =  $_POST['username'];
		$password=   $_POST['password'];

		if($username == "" || $password == "" ){
		header('Location: index.php?login=false');
		exit();		
	}
		$password = md5($password);
		$sql = "SELECT * FROM user WHERE username = '$username' AND password ='$password' "; 
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

		$_SESSION["login"] = true;
		$_SESSION["id"] =  $row["id"];
		$_SESSION["username"] =  $row["username"];
			session_write_close();
	
	header('Location: home.php');
	exit();
	
	}
}
}


?>