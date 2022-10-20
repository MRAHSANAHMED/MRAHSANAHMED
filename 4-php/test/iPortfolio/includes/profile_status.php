<?php //include "/header.php"; ?>
<?php include "database/db.php"; ?>
<?php include "helper-functions.php"; ?>

<?php session_start();
ob_start() ?>

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

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/magnific-popup.css" rel="stylesheet">

    <link href="css/templatemo-first-portfolio-style.css" rel="stylesheet">

    <!--

TemplateMo 578 First Portfolio

https://templatemo.com/tm-578-first-portfolio

-->
</head>

<body style="background:#14b789 ;">

<section class="preloader bg-light" ></section>
            <div class="spinner">
                <span class="spinner-rotate"></span>    
            </div>
        </section>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
           
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <h2  class="navbar-brand mx-auto mx-lg-0 text-primary"><?php echo ucwords($_SESSION['profile_name']);?></h2>

                
                <div class="d-flex align-items-center d-lg-none">
                    <a class="custom-btn btn" href="#section_5">
                    </a>
                </div>
                

                <div class="collapse navbar-collapse" id="navbarNav">
                     <?php
                            // $service_id = ($_GET['service_id']);

                            $service_query="SELECT * FROM services limit 1";
                            $result_service_query=run_query($service_query);
                            
                            if($result_service_query->num_rows >0){
                                while($row = mysqli_fetch_array($result_service_query)){




                     ?>
                    <ul class="navbar-nav ms-lg-5">
                
                        <li class="nav-item">
                            <a class="nav-link click-scroll text-primary" style="font-size:14px;"><?php echo $row['service_title'];?></a>
                        </li>

                    </ul>
                    <?php }}?>
                  
                    <div class="d-lg-flex align-items-center d-none ms-auto">
                        <i class="navbar-icon bi-telephone-plus me-3"></i>
                        <a class="custom-btn btn text-primary" href="#section_5">
                        <?php echo $_SESSION['profile_contact'];?>

                        </a>
                        <div  class="form-group" method="POST">
                      <a class="btn " style="color:red; font-size:14px;" type="submit" href="../admin/index.php">Admin</a>

                      <a class="btn " style="color:red; font-size:14px;" type="submit" href="../logout.php">Logout</a>
                    </div>
                    </div>
                    

                </div>

            </div>
        </nav>
    <?php 

// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     $liked = $_POST['liked'];
//     $unliked = $_POST['unliked'];

//     $user_id = $_POST['user_id'];
//     $profile_id = $_POST['profile_id'];
    
//     if (!empty($liked)) {
//         if (!empty($user_id) && !empty($profile_id)) {
//             $liked_query = "INSERT INTO profile_user (user_id,profile_id)";
//             $liked_query .= " VALUES ('{$user_id}','{$profile_id}')";
//             run_query($liked_query);
//         }
//     }

//     if (!empty($unliked)) {
//         if (!empty($user_id) && !empty($profile_id)) {
//             $unliked_query = "DELETE from profile_user where profile_id = '{$profile_id}' and user_id = '{$user_id}'";
//             run_query($unliked_query);
//         }
//     }
// }


 ?>

    <?php 

// dump_check($_GET);


// if (!empty($_GET['profile_id'])) {
//     $profile_id = $_GET['profile_id'];
//     $profile_query = "select * from posts left join categories on posts.profile_category_id = categories.cat_id where posts.profile_id = '$profile_id'";
//     $result = run_query($profile_query);
//     $profile_row = mysqli_fetch_array($result);


    // dump_check($profile_row);
//}
 ?>
    <!-- Page Content -->
    <div class="container mt-5 pt-5 ">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1 class="text-uppercase text-danger"><?php echo $_SESSION['profile_name']; ?></h1>

                <!-- Author -->
                <h4 class="lead text-capitalize text-warning">
                    CONTACT : <a href="#">
                        <?php echo $_SESSION['profile_contact']; ?>
                    </a>
                </h4>

                <h5 class="lead text-capitalize text-warning">
                    category: <a href="#"><?php echo $_SESSION['profile_category']; ?></a>
                </h5>

                <hr>

                <!-- Date/Time -->
                <p class="lead text-capitalize text-warning"><span class="glyphicon glyphicon-time"></span> Posted on
                    <?php //echo convertPostDate($profile_row['profile_date']); ?></p>

                <hr>


                <!-- Preview Image -->
                <?php  if ($_SESSION['profile_image']): ?>
                <img class="img-responsive text-capitalize w-50" src="/test/iPortfolio<?php echo  $_SESSION['profile_image']; ?>" alt="">
                <?php else: ?>
                <!-- <h3>Image Not Found</h3> -->
                <?php endif ?>

                <hr>

                <!-- Post Content -->
                <p>
                    <?php //echo $profile_row['profile_content']; ?>
                </p>

                <hr>


                <?php //if (isUserLikedThisPost()): ?>
                <div class="row">
                    <p class="pull-right">
                        <a class="unlike" href="" data-user-id="<?php //echo $_SESSION['user_id']; ?>"
                            data-post-id="<?php //echo $_GET['profile_id']; ?>"><span
                                class="glyphicon glyphicon-thumbs-down" data-toggle="tooltip" data-placement="top"
                                title="Want to like it?"></span>
                            Unlike
                        </a>
                    </p>
                </div>
                <?php //else: ?>

                <div class="row">
                    <p class="pull-right">
                        <a class="like" href="" data-user-id="<?php //echo $_SESSION['user_id']; ?>"
                            data-post-id="<?php //echo $_GET['profile_id']; ?>">
                            <span class="glyphicon glyphicon-thumbs-up" data-toggle="tooltip" data-placement="top"
                                title="Want to like it?"></span>
                            like
                        </a>
                    </p>
                </div>
                <?php //endif; ?>



                <!-- Blog Comments -->

                <!-- Comments Form -->
                <?php 

                // if (isUserLoggedIn()):


                // if($_SERVER["REQUEST_METHOD"] == "POST"){
                //     $user_id = $_SESSION['user_id'];
                //     $current_profile_id = $profile_id;
                //     $comment_content = $_POST['comment_content'];
                //     $comment_status = "Pending";


                //     $insert_comment_query = "INSERT into comments (user_id,profile_id,comment_status,comment_content,comment_date) VALUES ('$user_id','$current_profile_id','$comment_status','$comment_content',now())";

                //     run_query($insert_comment_query);
                //     redirect($_SERVER['PHP_SELF'] . '?profile_id=' . $profile_id);
                // }


                 ?>



                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="<?php //echo $_SERVER['PHP_SELF']; ?>?profile_id=<?php //echo $profile_id; ?>"
                        method="POST">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <?php //endif; ?>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

                <?php 
                //     $get_comments = "select * from comments left join users on comments.user_id = users.user_id where comments.post_id = '$post_id' and comments.comment_status = 'approved'"; 
                //     $result = run_query($get_comments);
                //  ?>

                 <?php // if ($result->num_rows > 0): ?>
                 <?php // while($row = mysqli_fetch_assoc($result)){ 
                //     // dump_check($row);

                //     $user_id = $row['user_id'];
                //     $comment_date = $row['comment_date'];
                //     $comment_content = $row['comment_content'];
                //     $user_firstname = $row['user_firstname'];
                //     $user_lastname = $row['user_lastname'];

                    ?>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php //echo $user_firstname. ' ' . $user_lastname; ?>
                            <small><?php //echo $comment_date; ?></small>
                        </h4>
                        <?php //echo $comment_content; ?>
                    </div>
                </div>
                <?php // } ?>
                <?php //endif ?>


            </div>

            <!-- Blog Sidebar Widgets Column -->


        </div>
        <!-- /.row -->
        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="copyright-text-wrap">
                            <p class="mb-0">
                                <span class="copyright-text">Copyright © 2022 <a href="#">First Portfolio</a> Company.
                                    All rights reserved.</span>
                                Design:
                                <a rel="sponsored" href="https://technottix.com" target="_blank">Ahsan A Sultan</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <script src="js/custom.js"></script>

</body>

</html>