<?php

// blog-website

$servername    = "localhost";
$username      = "root";
$password      = "";
$database_name = "html-template-ahsan";

//connection
$connection = mysqli_connect($servername,$username,$password,$database_name);
// checking
if (!$connection) {
    die("connection failed: " . mysqli_connect_error($connection));
    echo "not connect";
}else{
    // echo "great";
}