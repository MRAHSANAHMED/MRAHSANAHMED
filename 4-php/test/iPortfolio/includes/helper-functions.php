<?php

// $connection;

// define('BASE_URL','/batch-3-php/Batch-3/php/3-php-repeat-project-blog-site/website');

function run_query($query){
	global $connection;
	$result = mysqli_query($connection,$query);
    if (!$result) {
        die('QUERY FAILED ' . mysqli_error($connection));
    }
    return $result;
}

function redirect($url){
	header("Location:{$url}");
    exit;
}

function check($var){
	echo "<pre>";
    print_r($var);
    echo "</pre>";
    die();
}

function get_single_row($table_name='profiles',$column_name='profiles.profile_id',$column_value=null){
    $query =  "SELECT * from $table_name where $column_name = $column_value";
    $result = run_query($query);
    $row = mysqli_fetch_array($result);
    return $row;
}

function get_table_count($table_name='profiles'){
    $query = "SELECT * FROM $table_name";
    $result = run_query($query);
    return $result->num_rows;
}

// $row = get_single_row('profiles','profiles.profile_id',5);
// $row = get_single_row('users','users.user_id',1);




function isUserLoggedIn(){
    if (isset($_SESSION['user_id'])) {
        return true;
    }
    return false;
}


function loggedOut(){
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
}


function convertDate($date)
{
    $strtime_converted = strtotime($date);
    return $date ? date('M d, Y',$strtime_converted) : '';
}


function isUserLike()
{
    $profile_id = $_SESSION['profile_id'];
    // $customer_id = $_GET['customer_id'];

    $check_query = "SELECT * from (profiles,customer) where profile_id = '$profile_id'";

    $result = run_query($check_query);

    return $result->num_rows > 0 ? true : false; 
}



class UserModule {
    // public function getUserId(){
    //     if (isset($_SESSION['user_id'])) {
    //         return $_SESSION['user_id'];
    //     }
    //     return 0;
    // }
    public static function getUserId(){
        if (isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'];
        }
        return 0;
    }
}
