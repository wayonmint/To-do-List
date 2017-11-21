<?php
session_start();
require ('dbms.php');

if(!isset($_SESSION['login'])){
	header('Location: index.php?login=noLOGIN');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Todolist</title>
  <style>
    h4{
font-family: system-ui;
 text-align: right;
}
.atask{
  font-family: system-ui;

}
 .container{
  clear:both;
  list-style:none;
  color: #606060;
  width: 400px;
  margin: auto;
  font-size:  1em;
  text-align: left;
  font-family: system-ui;

}
.btnright{
text-align: right;
}
.pior{
text-align: right;
}
label {
  display: inline-block;
  width: 140px;
  text-align: left;
}​

hr.style12 {
  height: 6px;
  background: url(http://ibrahimjabbari.com/english/images/hr-12.png) repeat-x 0 0;
  border: 0;
}

  </style>
  <body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
<div class="navbar-header">
      <a class="navbar-brand" > <img src="b.png" width="50" height="30" class="d-inline-block align-top" alt=""></a>
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

<div class="row">
  <div class="col-sm-4" >
     <h4>All hidden list</h4>
      </div>
       <div class="col-sm-4">
       <br>
<?php
$sql_com = "SELECT * FROM tb_note WHERE user_id = '".$_SESSION['id']."' AND state = '3'  ORDER BY 'type' ASC";
$result_com = mysqli_query($conn,$sql_com);

if($result_com->num_rows >=0 ){
  while($row = mysqli_fetch_assoc($result_com)){
       echo '<p class="pior">'.$row["type"].'</p>';
           echo '<label>'.$row["header"].'</label><br>';
           echo  '<span  >detail: </span>'.$row["detail"];          
            echo '<p>due date: '.$row["timee"].'</p>';
           ?>
           <div class="btnright"> 
<a href="JavaScript:if(confirm('Confirm Delete?') == true)
            {window.location='depage.php?note_id=<?php echo $row["id"]; ?>';}"><span class="glyphicon glyphicon-remove" style="color: #ff1493"></span></a>
            <hr class="style12">
            </div>
    <?php
          }
        }
          ?>
  </div>
    <div class="col-sm-4" >
    </div>
  </div>
</body>
</head>
</html>
