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

$sql_com = "SELECT * FROM tb_note WHERE user_id = '".$_SESSION['id']."' AND state = '3'";
$result_com = mysqli_query($conn,$sql_com);

if($result_com->num_rows >=0 ){

  while($row = mysqli_fetch_assoc($result_com)){

           echo "<li>";
           echo '<label>'.$row["header"].'</label>';
           echo  $row["detail"];
           echo $row["type"];
           echo $row["timee"];
          
           ?>
<a href="JavaScript:if(confirm('Confirm Delete?') == true)
            {window.location='dehide.php?note_id=<?php echo $row["id"]; ?>';}">Delete</a>

    <?php
     echo "</li>";
          }
        }
          ?>

    <hr>