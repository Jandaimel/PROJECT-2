<?php
session_start();

//check if the user is logged in
if(!isset($_SESSSION['logged_in'])||!$_SESSION['logged_in']){
  header("location:login_form.html");
  exit();
}

//Database connection details
$servername="localhost";
$username="jandaimel";
$password="password123";

$dbname="taffa";

//fetch user data from the database
$sql="SELECT * FROM users";
$result=$conn->query($sql);

?>

<!DOCTYPE html>
<htmL>
<head>
	<title>Dashboard</title>
</head>
<body>
	<h2>Welcome,<?php echo$_SESSION['username'];?>!</h2>
	<table>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Actions</th>
		</tr>
	<?php while($row=$result->fetch_assoc()):?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['username'];?></td>
			<td>
				<a href="edit_record.php?id=<?php echo $row['id'];?>">Edit</a>
				<a href="delete_record.php?id=<?php echo $row['id'];?>">Delete</a>
			</td>
		</tr>
	<?php endwhile;?>
	</table>
	<a href="create_record.php">Create New User</a>
	<a href="logout.php">Logout</a>
</body>
</html>