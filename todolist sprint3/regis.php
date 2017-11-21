<!DOCTYPE html>
<html>
<head>
	<title>Register </title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style >
	.ok{
  width: 40%;
  margin-left: 30%;
  margin-right: 30%;
}
</style>
</head>
<body>

	<div class="row"> 
		<div class="col-sm-4"> </div>
		<div class="col-sm-4"> 
			<br><br>
	<form action="conregis.php" method="post">
		<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user" ></i></span>
		<input class="form-control" type="text" name="username"  placeholder="Username" required>
	</div>
	<br>
	<div class="input-group">
		 <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	
      <input  class="form-control"type="password" name="password" placeholder="Password" required><br>
  </div>
  <br>
  <div class="input-group">
		 <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	
      <input  class="form-control"type="password" name="re_password" placeholder="Password" required><br>
  </div>
  <br>

 
		<button type="submit" name="doregis" class="ok" >Register</button>
		</form>
		<br>
		<br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have an account already<a href="index.php"><span class="btncen" style="color: #ff1493">log in here</span></a> 

	</div>
	
	
	
	<div class="col-sm-4"> </div>
</div>
<!-- 	<form action="conregis.php" method="post">
		<label>Username :</label><input type="text" name="username" required> <br>
		<label>Password :</label><input type="password" name="password" required><br>
		<label>Re-Password :</label><input type="password" name="re_password" required><br>
		<button type="submit" name="doregis" >Register</button>
	</form> -->

</body>
</html>

