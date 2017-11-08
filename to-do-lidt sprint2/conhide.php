<?php
session_start();
require ('dbms.php');

if(!isset($_SESSION['login'])){
	header('Location: index.php?login=noLOGIN');
	exit();
}
	$id = $_GET['note_id']; 

	if($id == ""){
	  }
	$user_id = $_SESSION['id']; 
		
	$strSQL = " UPDATE tb_note SET state = '3' WHERE user_id = '".$_SESSION['id']."' AND  id = '".$_GET['note_id']."' ";

	if ($conn->query($strSQL) === TRUE) {
    
    	header('location: home.php?ok');
  		  exit();
	} 
	else {
    	echo "Error " . $sql ;
		}
 
?>