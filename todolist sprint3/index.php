<!DOCTYPE html>
<html>
<head>

   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <title>Todolist</title>
	<style >
label{
font-family: system-ui;
 text-align: right;
}
.ok{
  width: 40%;
  margin-left: 30%;
  margin-right: 30%;
}


	</style>

</head>
<body>
	

<?php if(isset($_GET['login'])){
echo '<h2> no login yet</h2>' ; 
}
	?>
	<div class="row"> 
		<div class="col-sm-4"> </div>
		<div class="col-sm-4"> 
			<br><br>
	<form action= "login.php" method="post">
		<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user" ></i></span>
		<input class="form-control" type="text" name="username"  placeholder="Username " required="">
	</div>
	<br>
	<div class="input-group">
		 <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	
      <input  class="form-control"type="password" name="password" placeholder="Password" required=""><br>
  </div>
  <br>
 
		<button type="submit" name="do" class="ok" >log in</button>
		</form>
		<br>
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dont have an account?<a href="regis.php"><span class="btncen" style="color: #ff1493">Register</span></a> 
	</div>
	
	
	
	<div class="col-sm-4"> </div>
</div>
</body>
</html>