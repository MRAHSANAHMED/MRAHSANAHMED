<?php 
$post_id = isset($_GET['edit']) ? $_GET['edit']: null;


// $get_post_row_query = "SELECT * FROM posts where posts.post_id = $post_id";
// $result = connection_query($get_post_row_query);
// $post_row = mysqli_fetch_array($result);
 
$post_row = get_single_row('posts','posts.post_id',$post_id);
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $post_title = $_POST['post_title'] ?? null;
    $post_category_id = $_POST['post_category_id'] ?? null;
    $post_author = $_POST['post_author'] ?? null;
    $post_date = $_POST['post_date'] ?? null;
    $post_content = $_POST['post_content'] ?? null;
    $post_tags = $_POST['post_tags'] ?? null;
    $post_status = $_POST['post_status'] ?? null;

    $post_image = null;
    $post_image_db_name = $post_row['post_image'];
    if(!empty($_FILES['post_image'])) {
        unlink($_SERVER['DOCUMENT_ROOT'] . '/my-work/html-templates/uploads/posts/' . $post_row['post_image']);

// dump_check($_SERVER['DOCUMENT_ROOT']);
// die();
         $post_image = $_FILES['post_image']['name'];
         $post_image_temp = $_FILES['post_image']['tmp_name'];
         move_uploaded_file($post_image_temp, "../uploads/posts/$post_image" );
    }
if($post_image){
    $post_image_db_name = "$post_image";
}


 $update_query = "UPDATE posts SET  post_title='$post_title',post_category_id ='$post_category_id',post_author='$post_author',post_date='$post_date',post_content='$post_content',post_tags='$post_tags',post_status='$post_status',post_image = '$post_image_db_name' where post_id = '$post_id'";
    $result = connection_query($update_query);
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>?source=edit&edit=<?php echo $post_row['post_id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Post Title</label>
                            <input type="text" class="form-control" id="" placeholder="Post Title" name="post_title" value="<?php echo $post_row['post_title'];?>">
                        </div>

                        <div class="form-group">
                            <label for="">Post Category</label>
                            <select name="post_category_id" id="input" class="form-control" >
                                <option value="">Select Category</option>
                                <?php
                                    $cat_query = "SELECT * FROM categories";
                                    $result = connection_query($cat_query); 
                                    ?>
                                   <?php if ($result->num_rows > 0): ?>
                                     <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                            <option value="<?php echo $row['cat_id']; ?>" 

                                                <?php echo $post_row['post_category_id'] == $row['cat_id'] ? 'selected' : ''; ?>
                                                >
                                                <?php echo $row['cat_title']; ?>        
                                            </option>
                                     <?php } ?>
                                 <?php endif ?>

                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Post Author</label>
                            <input type="text" class="form-control" id="" placeholder="Post Author" name="post_author" value="<?php echo $post_row['post_author'];?>">
                        </div>

                        <div class="form-group">
                            <label for="">Post Date</label>
                            <input type="date" class="form-control" id="" placeholder="Post Date" name="post_date" value="<?php echo $post_row['post_date'];?>">
                        </div>

                        <div class="form-group">
                            <label for="">Post Image</label>
                            <input type="file" name="post_image">
                             <img src="/my-work/html-templates<?php echo $post_row['post_image']; ?>" alt="" width="80" style="margin-top:20px;">

                        </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    

                        <div class="form-group">
                            <label for="">Post Content</label>
                            <textarea name="post_content" id="input" class="form-control" rows="3" required="required" > <?php echo $post_row['post_content']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Post Tags</label>
                            <input type="text" class="form-control" id="" placeholder="Post Tags" name="post_tags" value="<?php echo $post_row['post_tags'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Post Status</label>
                            <select name="post_status" id="input" class="form-control" required="required" >
                                <option value="">Post Status</option>
                                <option value="draft" <?php echo $post_row['post_status'] == 'draft' ? 'selected' : ''; ?>>Draft</option>
                                <option value="publish" <?php echo $post_row['post_status'] == 'publish' ? 'selected' : ''; ?>>Publish</option>
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