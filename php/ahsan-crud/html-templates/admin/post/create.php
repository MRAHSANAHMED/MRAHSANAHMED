
<?php 
 if($_SERVER['REQUEST_METHOD'] == "POST"){

    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_date = $_POST['post_date'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    $post_status = $_POST['post_status'];
    $post_image = null;
    $post_image2 = null;
    if(isset($_FILES['post_image'])) {
        //file uploading code start
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        move_uploaded_file($post_image_temp,"../uploads/posts/$post_image");
        //file uploading code end
    }
    if ($post_image){
        $post_image2 = "/uploads/posts/$post_image";
    }
    $post_insert_query = 
    "INSERT INTO posts (post_title,post_category_id,post_author,post_date,post_content,post_tags,post_status,post_comment_count,post_image) 
    VALUES ('$post_title','$post_category_id','$post_author','$post_date','$post_content','$post_tags','$post_status','0','$post_image')" order by posts.post_id DESC;
    $result = connection_query($post_insert_query);
    redirect('posts.php');

 }


?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Add Post
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <a href="posts.php" class="btn btn-primary">Back</a>

        <br><br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>?source=add" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Post Title</label>
                            <input type="text" class="form-control" id="" placeholder="Post Title" name="post_title">
                        </div>

                        <div class="form-group">
                            <label for="">Post Category</label>
                            <select name="post_category_id" id="input" class="form-control" >
                                <option value="">Select Category</option>
                                    <?php
                                    $cat_query = "SELECT * FROM categories";
                                    $result = connection_query($cat_query); 
                                    ?>
                                    <?php if ($result->num_rows > 0 ): ?>
                                        <?php while($row = mysqli_fetch_assoc($result)){?>
                                            <option value="<?php echo $row['cat_id']; ?>">
                                                <?php echo $row['cat_title']; ?>
                                            </option>
                                        <?php } ?>
                                        <?php endif ?>
                                    
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Post Author</label>
                            <input type="text" class="form-control" id="" placeholder="Post Author" name="post_author">
                        </div>

                        <div class="form-group">
                            <label for="">Post Date</label>
                            <input type="date" class="form-control" id="" placeholder="Post Date" name="post_date">
                        </div>

                        <div class="form-group">
                            <label for="">Post Image</label>
                            <input type="file" name="post_image">
                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    

                        <div class="form-group">
                            <label for="">Post Content</label>
                            <textarea name="post_content" id="input" class="form-control" rows="3" required="required"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Post Tags</label>
                            <input type="text" class="form-control" id="" placeholder="Post Tags" name="post_tags">
                        </div>
                        <div class="form-group">
                            <label for="">Post Status</label>
                            <select name="post_status" id="input" class="form-control" required="required">
                                <option value="">Post Status</option>
                                <option value="draft">Draft</option>
                                <option value="publish">Publish</option>
                            </select>
                        </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="create_post">Submit</button>
        </form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->