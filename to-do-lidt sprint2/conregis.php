
<?php
session_start();
include('dbms.php');

if(isset($_POST['doregis'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];

	if($username == "" || $password == "" || $re_password ==""){
		header('Location: regis.php? failnull');
		exit();		
	}

	if($password != $re_password){
		header('Location: regis.php? failpass');
		exit();
	}
	$password =md5($password);

		$sql = 	"INSERT INTO `user`(`id`, `username`, `password`, `status`, `date`) 
		VALUES (NULL,'$username','$password','0',CURRENT_TIMESTAMP)" ;

	if ($conn->query($sql) === TRUE) {
    
    header('location: index.php?ffffuck=1');
    exit();

	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();
	}


?>
