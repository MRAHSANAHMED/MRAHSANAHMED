<?php 
$session_id = $_SESSION['profile_id'];


if(!isset($session_id)){
    header('Location: login.php');
}

//     if(isset($session_id)){
//         return header('Location:index.php');
// }

?>