<?php
session_start();
include ('dbms.php');

if(isset($_POST['editbtn'])){

    $id = $_POST['note_id'];
    $header =$_POST['header'];
    $detail =$_POST['detail'];
    $time =  $_POST['time'];
    $type =  $_POST['type'];
		
    if($header =="" || $detail == "" || $type =="" ){
      header('Location: home.php?note=fail');

			exit();
		}

		if($todaydate > $time ){
			header('Location: home.php?note=faildate');
			exit();
		}
		//$user_id = $_SESSION['id'];
		$sql_comm = 
		"UPDATE tb_note
		 SET header = '$header',
		 detail ='$detail',
		 timee = '$time',
		 type = '$type'
		  WHERE id = '$id';";

	if ($conn->query($sql_comm) === TRUE) {
    
    	header('location: home.php?add=true');
  		  exit();
	} 
	else {

    	echo "Error ".$sql_comm ;
		}
	}
	
?>