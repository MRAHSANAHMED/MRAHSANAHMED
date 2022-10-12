<?php

define('BASE_URL', '/my-work/html-templates');

// $connection;

function connection_query($query){
    global $connection;
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
    return $result;
}

function redirect($url){
    header("Location:{$url}");
    exit;
}

function dump_check($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function get_single_row($table_name='posts',$column_name='posts.post_id',$column_value=null){
    $query = "SELECT * FROM $table_name where $column_name = $column_value";
    $result = connection_query($query);
    $row = mysqli_fetch_array($result);
    return $row;
}


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
