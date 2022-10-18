<?php


// blog-site-b3

$servername = "localhost";
$username = "root";
$password = "";
$database_name = 'iportfolio';

// Create connection
$connection = mysqli_connect($servername, $username, $password,$database_name);
// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error($connection));
}else{
	 // echo 'Database is connected';
}
