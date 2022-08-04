<?php

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
