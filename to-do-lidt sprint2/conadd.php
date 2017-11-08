<?php
session_start();
include ('dbms.php');

	if(isset($_POST['addtask'])){
		
		$header =$_POST['header'];
		$detail =$_POST['detail'];
		$type =  $_POST['type'];
		$time =  $_POST['time'];

		if($header =="" || $detail == "" || $type =="" ){
			//echo  $time->error;
			header('Location: home.php?note=failtime');

			exit();
		}

		$todaydate = @date('Y-m-d');


		if($todaydate > $time ){
			header('Location: home.php?note=faildate');
			exit();
		}
		$user_id = $_SESSION['id'];

		$sql = "INSERT INTO `tb_note`(`id`, `user_id`, `header`, `detail`, `timee`, `type`, `state`)
		VALUES (NULL,'$user_id','$header','$detail','$time','$type','0')";

	if ($conn->query($sql) === TRUE) {
    
    	header('location: home.php?ok');
  		  exit();
	} 
	else {
    	echo "Error " . $sql ;
		}

}
	
?>