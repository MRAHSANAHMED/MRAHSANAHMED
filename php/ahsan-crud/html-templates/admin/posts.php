<?php include "includes/header.php"; ?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Posts Crud
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // $post_query = "SELECT * from posts";
                                $post_query = "SELECT * FROM `posts` left join categories on posts.post_category_id = categories.cat_id";
                                $result = connection_query($post_query);
                                if($result->num_rows > 0):
                                 ?>

                                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                <tr>
                                    <td><?php echo $row['post_id']; ?></td>
                                    <td><?php echo $row['post_title']; ?></td>
                                    <td><?php echo $row['cat_title']; ?></td>
                                    <td><?php echo $row['post_author']; ?></td>

                                    <?php 
                                    $postImage =  $row['post_image'];

                                     ?>
                                    <td>
                                        <?php if ($postImage): ?>
                                        <img src="/my-work<?php echo $row['post_image']; ?>" alt="<?php echo $row['post_title']; ?>" width="100">
                                        <?php else: ?>
                                            image not found
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $row['post_status']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php"; ?>