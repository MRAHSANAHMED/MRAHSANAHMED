<?php //include "/header.php"; ?>
<?php include "database/db.php"; ?>
<?php include "helper-functions.php"; ?>

<?php session_start();
ob_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="TemplateMo">

    <title>First Portfolio Bootstrap 5 Theme</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https:fonts.googleapis.com">

    <link rel="preconnect" href="https:fonts.gstatic.com" crossorigin>

    <link href="https:fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/magnific-popup.css" rel="stylesheet">

    <link href="css/templatemo-first-portfolio-style.css" rel="stylesheet">
<style>
   a:hover {
  background-color: yellow;
}
</style>
    <!--

TemplateMo 578 First Portfolio

https:templatemo.com/tm-578-first-portfolio

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
                
                    <ul class="navbar-nav ms-lg-5">
                
                        <li class="nav-item">
                            <p class="nav-link click-scroll text-primary" style="font-size:14px;"><?php echo $_SESSION['profile_category'];?></p>
                        </li>

                    </ul>
                   
                  
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

 if ($_SERVER['REQUEST_METHOD'] == "POST") {
     $liked = $_POST['liked'];
     $unliked = $_POST['unliked'];

    //  $customer_id = $_POST['customer_id'];
    //  $profile_id = $_POST['profile_id'];
    // check($profile_id);
    //  if (!empty($liked)) {
    //      if (!empty($customer_id) && !empty($profile_id)) {
    //          $liked_query = "INSERT INTO profile_user (customer_id,profile_id)";
    //          $liked_query .= " VALUES ('{$customer_id}','{$profile_id}')";
    //          run_query($liked_query);
    //      }
    //  }

//      if (!empty($unliked)) {
//          if (!empty($customer_id) && !empty($profile_id)) {
//              $unliked_query = "DELETE from profile_user where profile_id = '{$profile_id}' and customer_id = '{$customer_id}'";
//              run_query($unliked_query);
//          }
//      }
//  }


 ?>

    <?php 




//  if (!empty($_GET['profile_id'])) {
//      $profile_id = $_GET['profile_id'];
//      $profile_query = "select * from posts left join categories on posts.profile_category_id = categories.cat_id where posts.profile_id = '$profile_id'";
//      $result = run_query($profile_query);
//      $profile_row = mysqli_fetch_array($result);


    
}
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
                    CONTACT &nbsp;&nbsp;: <a href="#"> 
                        <?php echo $_SESSION['profile_contact']; ?>
                    </a>
                </h4>

                <h5 class="lead text-capitalize text-warning">
                    CATEGORY : <a href="#"><?php echo $_SESSION['profile_category']; ?></a>
                </h5>

                <hr>

                <!-- Date/Time -->
                <!-- <p class="lead text-capitalize text-warning"> CREATED ID ON :
                    <?php //echo convertDate($profile_row['profile_date']); ?></p>
                    <hr> -->


                    <h5 class="lead text-capitalize text-warning">SEPCIALTY :
                    <a href="#"> <?php echo $_SESSION['profile_content']; ?></a></h5>

                <hr>


                <!-- Preview Image -->
                <?php  if ($_SESSION['profile_image']): ?>
                <img class="img-responsive text-capitalize w-75" src="/test/iPortfolio<?php echo $_SESSION['profile_image']; ?>" alt="">
                <?php else: ?>
                <!-- <h3>Image Not Found</h3> -->
                <?php endif ?>

                <hr>
               
                <div>
                            <?php 
                        $comment_query = "SELECT * FROM comments left join profiles on comments.profile_id = profiles.profile_id WHERE comment_status = 'approved' 
                                             ORDER BY comments.comment_id DESC ;";
                        $result = run_query($comment_query);
                        if ($result->num_rows > 0){
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <div class="d-flex justify-content-between" >
                                <div>
                                    <h5 class="lead text-capitalize text-warning">
                                    CUSTOMER NAME : <a href="#"><?php  echo $row['customer_name']; ?></a>
                                    </h5>
                                </div>
                                <div>
                                    <?php
                                    // echo '<pre>';
                                    // print_r($row['comment_rate']);
                                    // die();
                                    ?>
                                    <h5 class="lead text-capitalize text-warning" >
                                        RATING : <a href="#"><?php //echo $row['comment_rate']
                                        if($row['comment_rate'] == 'LIKE'){ ?>
                                            <div>
                                                <span  style="font-size:40px;" class="glyphicon bi-hand-thumbs-up-fill"></span>
                                                </div>
                                        <?php } elseif($row['comment_rate'] == 'UNLIKE'){ ?>
                                            <div>
                                            <span  style="font-size:40px;" class="glyphicon bi-hand-thumbs-down-fill"></span>
                                            </div>
                                        <?php } elseif($row['comment_rate'] == 'AVERAGE'){ ?>
                                            <div>
                                            <span  style="font-size:40px;" class="glyphicon bi-emoji-neutral"></span>
                                            </div>
                                        <?php }else{ ?>
                                            <div>
                                            <span  style="font-size:40px;" class="glyphicon bi-emoji-dizzy-fill"></span>
                                            </div>
                                        <?php }                                     
                                         ?></a>
                                    </h5>
                                </div>
                        </div>
                           <div>
                                <h5 class="lead text-capitalize text-warning">
                                    CUSTOMER COMMENT : <a href="#"><?php echo $row['comment_content']; ?></a>
                                </h5>
                           </div>
                        <HR>
                    
                    <?php }}?>
                </div>
    
 
 
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php // echo $user_firstname. ' ' . $user_lastname; ?>
            <small><?php //echo $comment_date; ?></small>
        </h4>
        <?php // echo $comment_content; ?>
    </div>
</div>
<?php // } ?>
<?php //endif ?>


</div>


              

                
               



        <!--include footer -->
        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="copyright-text-wrap">
                            <p class="mb-0">
                                <span class="copyright-text">Copyright © 2022 <a href="#">First Portfolio</a> Company.
                                    All rights reserved.</span>
                                Design:
                                <a rel="sponsored" href="https:technottix.com" target="_blank">Ahsan A Sultan</a>
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