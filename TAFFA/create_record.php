<?php
session_start();

include 'database_connection.php';
$conn=connection_to_database();

//check if the user is logged in
if(!isset($_SESSSION['logged_in'])||!$_SESSION['logged_in']){
  header("location:index.html");
  exit();
}

$conn=new mysqli($servername,$username,$password,$dbname);

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$username=$_POST['username'];
	$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
	
	$sql="INSERT INTO users(username,password) VALUES (?,?)";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("ss",$username,$password);
	$stmt->execute();
	
	header("Location:dashboard.php");
	exit();
	
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create User</title>
</head>
<body>
	<h2>Create New User</h2>
	<form method="post" action="">
		<label for="username">Username:</label>
		<input type="text" name="username" required><br>
		<label for="password">Password:</label>
		<input type="text" name="password" required><br>
		<input type="submit" value="create">
	</form>
</body>
</html>