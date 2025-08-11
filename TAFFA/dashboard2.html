<?php
session_start();
if(!isset($_SESSION['logged_in'])||!$_SESSION['logged_in']){
  header("location:index.html");
  exit;
}
include 'database_connection.php';
$conn=connection_to_database();

//fetch user data from the database
$sql="SELECT * FROM users";
$result=$conn->query($sql);


<!DOCTYPE html>
<htmL>
<head>
	<title>Dashboard</title>
</head>
<body>
	<h2>Welcome, <?php echo$_SESSION['username'];?>!</h2>
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
                <a href="edit_record.php?ID=<?php echo $row['ID']); ?>">Edit</a>
                <a href="delete_record.php?ID=<?php echo $row['ID']); ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="create_record.php">Create New User</a> | 
    <a href="logout.php">Logout</a>
</body>
</html>
