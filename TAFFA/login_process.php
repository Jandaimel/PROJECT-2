<?php

session_start();

include 'database_connection.php';
$conn = connection_to_database();

//Database connection details
$servername="localhost";
$username="jandaimel";
$password="password123";

$dbname="taffa";

//create a connection to the Database
$conn= new mysqli($servername,$username,$password,$dbname);


//check the connection
if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}

//retrieve the username and password from the form
$_POST['username']=$username;
$_POST['password']=$password;

//prepare the sql statement to select the user from the Database
$sql="SELECT*FROM users WHERE username=? AND password=?";

//create a prepared statement
$stmt=$conn->prepare($sql);

//bind paramaters
$stmt->bind_param("ss",$username,$password);

//execute the statement
$stmt->execute();

//GET the REESULT set
$result=$stmt->get_result();

//check if a user was found
if($result->num_rows>0){
	//user found, log them in
	//Redirect to the protected area or display a welcome message
	//echo "Login successful";
	$_SESSION['logged_in']=true;
	$_SESSION['username']=$username;
	header("Location: dashboard.php");
	exit();
	}else{
	  //USer not found, display an error messege 
	  echo "Invalid username or password.";
	}
	
	//Close the statement and connection
	$stmt->close();
	$conn->close();
	
	
?>