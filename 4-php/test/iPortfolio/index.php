<?php
    include "includes/header.php";
     include "includes/gaurd.php"; 
?>

<?php 
// if ($_SERVER['REQUEST_METHOD'] == "POST"){
//     $customer_name = $_POST['customer_name'];
//     // $comment_status = $_POST['comment_status'];
//     $comment_content = $_POST['comment_content'];
//     // $comment_submit = $_POST['created_at'];
//     $comments_query = "INSERT INTO comments (customer_name,comment_content) 
//                     VALUES ('$customer_name','$comment_content')";
// $result=run_query($comments_query);

// check($result);
// }

?>


<?php  //check($_SESSION);?>

<?php include "includes/navigation.php"?>
<?php include "includes/profile.php"?>
 <?php include "includes/information.php"?>   
 <?php include "includes/other-profiles.php"?>
 <?php include "includes/services.php"?>
 <?php include "includes/skills.php"?>
 <?php include "includes/contact-about.php" ?>
<?php include "includes/customer-rate.php"?>
 <?php include "includes/footer.php"?>