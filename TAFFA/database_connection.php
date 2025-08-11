<?php
function connection_to_database(){
  $servername="localhost";
  $username="jandaimel";
  $password="password123";
  $dbname="taffa";

   
   //create connection
   $conn=new mysqli($servername,$username,$password,$dbname);
   
   //check connection
   if($conn->connect_error){
	  die("Connection failed:".$conn->connect_error);
   }
   
   return$conn;
}
?>