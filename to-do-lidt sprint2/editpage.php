<?php
session_start();
require ('dbms.php');

if(!isset($_SESSION['login'])){
	header('Location: index.php?login=noLOGIN');
	exit();
}
?>
<h2>Hello <?php  echo $_SESSION['username']; ?> </h2>
<h2>Edit Todolist</h2>
<?php

$sql_incom = "SELECT * FROM tb_note WHERE user_id = '".$_SESSION['id']."' AND  id = '".$_GET['note_id']."' AND state = '0' ";
$result_incom = mysqli_query($conn,$sql_incom);
if($result_incom->num_rows >0 ){

  while($row = mysqli_fetch_assoc($result_incom)){
  	
var_dump($row);
  	echo '<form action="conedit.php" method="post">';
	echo '<label>header: </label> <br>';
	echo  '<input type="text"  name="header" value="'.$row["header"].'"> <br>';
	echo '<label>detail: </label>  <br>';

	echo  '<textarea type="text" name="detail" cols="66" rows="10">'.$row["detail"].'</textarea> <br>' ;

	echo '<label>priority:</label><br>';
	echo '<input type="text"  name="type" value="'.$row["type"].'"><br>';

	echo '<input type="date"  name ="time" value="'.$row["timee"].'"><br>';

	echo '<input type="hidden" name="note_id" value="'.$row["id"].'">'; 

	echo '<button type="edit" name="editbtn"> edit</button>';
echo '</form> ';

          }
        }
?>