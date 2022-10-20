<?php 

session_start();
ob_start();

include "includes/database/db.php";
include "includes/helper-functions.php";


   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$input_profile_name = $_POST['profile_name'];
	$input_password = $_POST['password'];

    
	$get_user_row = "Select * from profiles left join skills on profiles.profile_skill = skills.skill_id left join skills2 on profiles.profile_skill2 = skills2.skill2_id where profiles.profile_name = '$input_profile_name'";
	$result = run_query($get_user_row);
	$row = mysqli_fetch_array($result);
	$db_password = $row['profile_password'];
	$db_profile_name = $row['profile_name'];
	$db_profile_id = $row['profile_id'];
	$db_profile_email = $row['profile_email'];
	$db_profile_contact = $row['profile_contact'];
	$db_profile_image = $row['profile_image'];
	$db_profile_skill = $row['profile_skill'];
	$db_profile_skill2 = $row['profile_skill2'];
	$db_profile_category = $row['profile_category'];
	$db_profile_content = $row['profile_content'];
	$db_profile_skill_title = $row['skill_title'];
	$db_profile_skill2_title = $row['skill2_title'];
	if (password_verify($input_password, $db_password)) {
		$_SESSION['profile_id'] = $db_profile_id;
		$_SESSION['profile_name'] = $db_profile_name;
		$_SESSION['profile_email'] = $db_profile_email;
		$_SESSION['profile_contact'] = $db_profile_contact;
		$_SESSION['profile_image'] = $db_profile_image;
		$_SESSION['profile_skill'] = $db_profile_skill;
		$_SESSION['profile_skill2'] = $db_profile_skill2;
		$_SESSION['profile_category'] = $db_profile_category;
		$_SESSION['profile_content'] = $db_profile_content;
		$_SESSION['skill_title'] = $db_profile_skill_title;
		$_SESSION['skill2_title'] = $db_profile_skill2_title;
		return redirect('/test/iportfolio/index.php');
	}else{
		return redirect('/test/iportfolio/login.php');
	}
}
?>



<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="TemplateMo">

        <title>First Portfolio Bootstrap 5 Theme</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

        <link href="includes/css/bootstrap.min.css" rel="stylesheet">

        <link href="includes/css/bootstrap-icons.css" rel="stylesheet">

        <link href="includes/css/magnific-popup.css" rel="stylesheet">

        <link href="includes/css/templatemo-first-portfolio-style.css" rel="stylesheet">
        
<!--

TemplateMo 578 First Portfolio

https://templatemo.com/tm-578-first-portfolio

-->
    </head>
    
    <body>