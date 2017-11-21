 <?php session_start(); 
 require ('dbms.php');
  if(!isset($_SESSION['login'])){ header('Location: index.php?login=noLOGIN'); exit(); }
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
  margin-right: 20%;
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
  <h2>Make your own To-Do-List </h2> <br>

<h3>Add todolist</h3>
<div class="container">

<form action="conadd.php" method="post">

  <label>header:  </label> 

   <input class="w3-input w3-border w3-round-large" type="text"  name="header" ><br>
  <label>detail: </label> 
  <textarea  type="text" name="detail" cols="44" rows="5"  class="w3-input w3-border w3-round-large" ></textarea> <br>
  <label>priority:</label>

          <select name="type"> 
            <option> Highly important </option> 
            <option> Important </option> 
            <option> Normall </option> 
        </select><br><br>

<label>deadline</label>
  <input type="date"  name ="time" class="w3-input w3-border w3-round-large"><br>

  <button type="submit" name="addtask" class="btn"> submit</button>
</form>
</div>
<br>
<br>

<h3>Doing list</h3>

  <?php
$sql_incom = "SELECT * FROM tb_note WHERE user_id = '".$_SESSION['id']."' AND state = '0'  ORDER BY 'type' ASC";
$result_incom = mysqli_query($conn,$sql_incom);
if($result_incom->num_rows >=0 ){
  while($row = mysqli_fetch_assoc($result_incom)){
?>
    <div class="mid">
      <?php
           echo "<li>";
           echo '<p class="pior">'.$row["type"].'</p>';
           echo '<label>'.$row["header"].'</label><br>';
           echo  '<span  >detail: </span>'.$row["detail"];          
            echo '<p>due date: '.$row["timee"].'</p>';
            ?>
           <div class="btnright">
            <a href="editpage.php?note_id=<?php echo $row["id"]; ?>"><span class="glyphicon glyphicon-edit"  style="color: #00bfff"></span></a>
           <a href="JavaScript:if(confirm('Confirm Done?') == true)
            {window.location='conshow.php?note_id=<?php echo $row["id"]; ?>';}"><span class="glyphicon glyphicon-ok" style="color: #32cd32"></span></a>
            <a href="JavaScript:if(confirm('Confirm Delete?') == true)
            {window.location='dehide.php?note_id=<?php echo $row["id"]; ?>';}"><span class="glyphicon glyphicon-remove" style="color: #ff1493"></span></a>         
       <hr  class="style12">
            <?php
           echo "</li>";
          }
        }
          ?>
        </div>
        <br>      

<h3>Complete list </h3>
<br>
 <?php
$sql_com = "SELECT * FROM tb_note WHERE user_id = '".$_SESSION['id']."' AND state = '1' ORDER BY 'type' ASC";
$result_com = mysqli_query($conn,$sql_com);
if($result_com->num_rows >=0 ){
  while($row = mysqli_fetch_assoc($result_com)){
?>
<div class="mid">
    <?php
           echo "<li>";
 echo '<p class="pior">'.$row["type"].'</p>';
           echo '<label>'.$row["header"].'</label><br>';
           echo  '<span  >detail: </span>'.$row["detail"];          
            echo '<p>due date: '.$row["timee"].'</p>';?>
<div class="btnright">
   <a href="JavaScript:if(confirm('Confirm Hide?') == true){window.location='conhide.php?note_id=<?php echo $row["id"]; ?>';}"><span class="glyphicon glyphicon-eye-close"  style="color: black"></span></a>
            <a href="JavaScript:if(confirm('Confirm Delete?') == true)
            {window.location='depage.php?note_id=<?php echo $row["id"]; ?>';}"><span class="glyphicon glyphicon-remove" style="color: #ff1493"></span></a>
 </div>
 <hr  class="style12">
            <?php echo "</li>";
          }
        }?>
   </div>
    <div class="hidbtn">
  <form action="pagehide.php" method="post">
  <button type="submit" name="showallhid" class="btn" > all hide list </button>
</form>
</div>
<br>
<br>
<br>
    </body>
</html>
