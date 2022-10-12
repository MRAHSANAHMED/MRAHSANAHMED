<?php include "includes/header.php"; ?>

<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 
                $post_query = "SELECT * FROM posts";
                $result = connection_query($post_query);
                ?>
               
                <?php if ($result ->num_rows > 0):?>
                    <?php while($row = mysqli_fetch_assoc($result)){?>




                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $row['post_title'];?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $row['post_author'];?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on 

                    <?php  

                    $strttime_converted = strtotime($row['post_date']);
                    echo $row['post_date'] ? date('M d, Y', $strttime_converted) : '';



                    ?>




                </p>
                <hr>


                <?php if ($row['post_image']):?>
                <img class="img-responsive" src="/my-work/html-templates/uploads/posts/<?php echo $row['post_image']?>" alt="<?php echo $row['post_title'];?>" style="width: 180px;">
            <?php else :?>
                <h2>image not found</h2>
            <?php endif ?>

                <hr>
                <p><?php echo $row['post_content'];?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php }?>


        <?php endif ?>
                <!-- Second Blog Post -->
                
                

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
          <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include 'includes/footer.php'; ?>

    