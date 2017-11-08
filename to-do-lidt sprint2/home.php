<!DOCTYPE html>
<html>
<head>
   <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <script src ="js/main.js"></script> 
  <title></title>
</head>
<body>
  <?php
session_start();
require ('dbms.php');

if(!isset($_SESSION['login'])){
  header('Location: index.php?login=noLOGIN');
  exit();
}

?>

<h1>TELETUBBIES TODOLIST</h1> 


<h2>Hello <?php  echo $_SESSION['username']; ?> </h2>
<h2>Add Todolist</h2>
 

<form action="conadd.php" method="post">

  <label>header: </label> <br>
   <input type="text"  name="header" > <br>
  <label>detail: </label>  <br>

  <textarea  type="text" name="detail" ></textarea> <br>
  <label>priority:</label><br> 
  <input type="text"   name="type" ><br>

  <input type="date"  name ="time" ><br>

  <button type="submit" name="addtask"> submit</button>
</form>

<hr>
<h3>doing Todolist</h3>
  <?php
$sql_incom = "SELECT * FROM tb_note WHERE user_id = '".$_SESSION['id']."' AND state = '0'";
$result_incom = mysqli_query($conn,$sql_incom);

if($result_incom->num_rows >=0 ){

  while($row = mysqli_fetch_assoc($result_incom)){

           echo "<li>";
           echo '<label>'.$row["header"].'</label>';
           echo  $row["detail"];
           echo $row["type"];
            echo $row["timee"];
            ?>
            <a href="editpage.php?note_id=<?php echo $row["id"]; ?>"> Edit</a>

           <a href="JavaScript:if(confirm('Confirm Done?') == true)
            {window.location='conshow.php?note_id=<?php echo $row["id"]; ?>';}">done</a>

            <a href="JavaScript:if(confirm('Confirm Delete?') == true)
            {window.location='depage.php?note_id=<?php echo $row["id"]; ?>';}">Delete</a>

            <?php
           echo "</li>";
          }
        }
          ?>
<hr>
<h2>completelist todolist</h2>

 <?php
$sql_com = "SELECT * FROM tb_note WHERE user_id = '".$_SESSION['id']."' AND state = '1'";
$result_com = mysqli_query($conn,$sql_com);

if($result_com->num_rows >=0 ){

  while($row = mysqli_fetch_assoc($result_com)){

           echo "<li>";
           echo '<label>'.$row["header"].'</label>';
           echo  $row["detail"];
           echo $row["type"];
            echo $row["timee"];
            ?>

            <a href="JavaScript:if(confirm('Confirm Hide?') == true)
            {window.location='conhide.php?note_id=<?php echo $row["id"]; ?>';}">hide</a>
            <a href="JavaScript:if(confirm('Confirm Delete?') == true)
            {window.location='depage.php?note_id=<?php echo $row["id"]; ?>';}">Delete</a>

            <?php
           echo "</li>";
          }
        }
          ?>
    <hr>

  <h2>show all hide complete todolist</h2> <br>

  <form action="pagehide.php" method="post">
  <button type="submit" name="showallhid"> show hide</button>
</form>


    <a href="logout.php">Logout </a>


    </body>
</html>
