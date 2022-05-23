<?php

$connect = mysqli_connect('localhost', 'root', '', 'ahsan-crud');
if($connect) {
    echo 'connection on ';
}else{
    'not connected';
}
function custom_query($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);

    if(!$result){
        die('Query Failed' . mysqli_error($connect));
    }
    return $result;
}
?>