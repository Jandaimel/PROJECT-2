<?php
session_start();
session_destroy();
header("Location:login_form.html");
exit();

include 'database_connection.php';
$conn=connect_to_database();
?>