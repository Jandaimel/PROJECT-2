PHP
<?php 
session_start();

//data base connectiondetails (replace with your credentials)
$servername="localhost";
$username="jandaimel";
$password="password123";
$dbname="taffa";

//create a database connection
$conn=new mysqli($servername,$username,$password,$dbname);

//check connection
if($conn->connect_error)
  {
	die("Connection failed: ".$conn->connect_error);
  }
  
//retrieve username and password from the form
$username=$_POST['username'];
$password=$_POST['password'];

//prepare and execute SQL query to check user credentials
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss",$username,$password);
$stmt->execute();

$result=$stmt->get_result();

if($result->num_rows
 >0) {
 $_SESSION['logged_in']=true;
 $_SESSION['username']=$username;
 header("location:dashboard.php");
 exit();
}else{
  //handle login failure
  echo"Invalid username or password.";
}

$stmt->close();
$conn->close();

include 'database_connection.php';
$conn=connect_to_database();
?>