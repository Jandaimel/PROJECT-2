<?php
session_start();
//check if the user is logged in
if(!isset($_SESSION['logged_in'])||!$_SESSION['logged_in']){
  header("location:index.html");
  exit();
}

//Database connection details
include 'database_connection.php';
$conn=connection_to_database();

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
	<h2>Welcome, <?php echo$_SESSION['username'];?>!</h2>
	<table>
		<tr>
			<th>id</th>
			<th>Username</th>
			<th>Actions</th>
		</tr>
	<?php while($row=$result->fetch_assoc()):?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['username'];?></td>
			<td>
				<a href="edit_record.php?id=<?php echo $row['ID'];?>">Edit</a>
				<a href="delete_record.php?id=<?php echo $row['ID'];?>">Delete</a>
			</td>
		</tr>
	<?php endwhile; ?>
	</table>
	<a href="create_record.php">Create New User</a>
	<a href="logout.php">Logout</a>
</body>
</html>
