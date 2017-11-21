<?php
session_start();
require ('dbms.php');

if(!isset($_SESSION['login'])){
	header('Location: index.php?login=noLOGIN');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <title>todolist</title>
<meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <style> 
  @import url(https://fonts.googleapis.com/css?family=Open+Sans);
  body{
    background:url('css/1.jpg');
}
 h2 {
  clear:both;
  list-style:none;
  font-size:  2.5em;
  font-family: 'URW Chancery L', cursive;
  text-align: center;
}
 h3 {
  clear:both;
  list-style:none;
  font-size:  2em;
  font-family: 'Optima', sans-serif;
  text-align: center;
  /*text-indent:15%;*/
}

 .container{
  clear:both;
  list-style:none;
  color: #606060;
/*  background-color: black;*/
  width: 400px;
  margin: auto;
  font-size:  1em;
  font-family: 'Optima', sans-serif;
  text-align: left;

}
.btn{
  width: 40%;
  margin-left: 30%;
  margin-right: 30%;
  color: #ff1493;
  transition: .3s;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -o-transition: .3s;
  font-weight:bold;
}
 .mid{
  clear:both;
  list-style:none;
  color: #606060;
/*  background-color: black; */
  width: 500px;
  margin: auto;
  font-size:  1em;
  font-family: 'Optima', sans-serif;
  text-align: left;

}
hr.style5 {
  background-color: #fff;
  border-top: 2px dashed #8c8b8b;
}
hr.style12 {
  height: 6px;
  background: url(http://ibrahimjabbari.com/english/images/hr-12.png) repeat-x 0 0;
  border: 0;
}
.pior{
   text-align: right;
}

.btnright{
text-align: right;
}

.hidbtn{
  clear:both;
  list-style:none;
  color: #606060;
/*  background-color: black; */
  width: 500px;
  margin: auto;
  font-size:  1em;
  font-family: 'Optima', sans-serif;
  text-align: left;

}
</style>
</head>
<body>  
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TEAM TLTB</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php  echo $_SESSION['username']; ?> </a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<?php

$sql_incom = "SELECT * FROM tb_note WHERE user_id = '".$_SESSION['id']."' AND  id = '".$_GET['note_id']."' AND state = '0' ";
$result_incom = mysqli_query($conn,$sql_incom);
if($result_incom->num_rows >0 ){

  while($row = mysqli_fetch_assoc($result_incom)){
?>
<h3>Edit Todolist</h3>
<div class="container">

<?php
  	echo '<form action="conedit.php" method="post">';
	echo '<label>header: </label> <br>';
	echo  '<input type="text"  name="header" class="w3-input w3-border w3-round-large" value="'.$row["header"].'"> <br>';
	echo '<label>detail: </label>  <br>';

	echo  '<textarea type="text" name="detail" cols="44" rows="5" class="w3-input w3-border w3-round-large" >'.$row["detail"].'</textarea> <br>' ;

	echo '<label>priority:</label><br>';

	?>

<select name="type">
                                                                <option
                                                                   value="Highly important"<?=$row['type'] == "Highly important" ? ' selected="selected"' : ''?>>Highly important</option>
                                                                </option>
                                                                <option value="Important"<?=$row['type'] == "Important" ? ' selected="selected"' : ''?>>Important</option>
                                                              <option
                                                                   value="Normall"<?=$row['type'] == "Normall" ? ' selected="selected"' : ''?>>Normall</option>
                                                                </option>
                                                            </select>

  <?php

	echo '<input type="date"  name ="time" class="w3-input w3-border w3-round-large" value="'.$row["timee"].'"><br>';

	echo '<input type="hidden" name="note_id" class="w3-input w3-border w3-round-large"  value="'.$row["id"].'">'; 

	echo '<button type="edit" name="editbtn" class="btn" > edit</button>';
echo '</form> ';

          }
        }
?>
</div>
</body>
</html>