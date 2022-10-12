<?php include "includes/header.php"?>

<?php 
//post (add/edit) methods

if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     echo "<pre>";
//   print_r($_POST);  
//   echo "</pre>";
$post_category_id = $_POST['post_category_id'];
$post_title = $_POST['post_title'];
$post_author = $_POST['post_author'];
$post_image = $_POST['post_image'];
$post_status = $_POST['post_status'];
if (isset($_GET['edit'])){
    $post_id = $_GET['edit'];
    $post_query = "UPDATE posts set 
            post_title='$post_title' , post_author = '$post_author', post_status = '$post_status', post_category_id = '$post_category_id' , post_image ='$post_image' where post_id = '$post_id'";
}else{
    $post_query ="INSERT INTO posts (`post_title`,`post_category_id`,`post_author`,`post_status`,`post_image`) 
                             VALUES ('$post_title','$post_category_id','$post_author','$post_status','$post_image')";

}
   
connection_query($post_query);
redirect("posts1.php");
//  echo "<pre>";
//   print_r();  
//   echo "</pre>";
}



// DELETE WORK
if(isset($_GET['delete'])){
    $post_id = $_GET['delete'];
    $post_delete_query = "DELETE FROM posts where post_id =$post_id";

    connection_query($post_delete_query);
    redirect("posts1.php");
    }


 ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts Crud
                        </h1>
                    </div>
                </div>
                <!-- /.row -->



<div class="row">
   <div class="col-lg-2 col-xs-2 col-sm-2">
    <div class="form-group">
<?php 

                        // echo "<pre>";
                        // print_r($_SERVER);
                        // echo "</pre>";

                         ?>

<?php if(isset($_GET['edit'])): ?>
<?php
$post_id = $_GET['edit'];
$get_posts_query = "select * from posts WHERE post_id = '$post_id'";

 $result = connection_query($get_posts_query); 
                        // echo "<pre>";
                        // print_r($post_id);
                        // echo "</pre>";
// redirect("posts1.php");
?>
<?php if($result->num_rows > 0): ?>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>?edit=<?php echo $post_id;?>?>" method="POST" role="form">
                          
            
            <label for="">UPDATE POST</label>
            <input type="text" name="post_title" class="form-control" id="" value="<?php echo $row['post_title']; ?>" placeholder="Title">
            <input type="text" name="post_category_id" class="form-control" id="" value="<?php echo $row['post_category_id']; ?>" placeholder="Category">
            <input type="text" name="post_author" class="form-control" id="" value="<?php echo $row['post_author']; ?>" placeholder="author">
            <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
            <input type="file" name="post_image" value="<?php echo $row['post_image']; ?>" id="fileToUpload">
            <!-- </form> -->
            <input type="text" name="post_status" class="form-control" id="" value="<?php echo $row['post_status']; ?>" placeholder="Status">
                                  
            </div>
                          
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
   

<?php } ?>
<?php endif; ?>
<?php else: ?>

<!-- insert form -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" role="form">
                          
            <div class="form-group">
            <label for="">CREATE POST</label>
            <input type="text" name="post_title" class="form-control" id="" placeholder="Title">
            <input type="text" name="post_category_id" class="form-control" id="" placeholder="Category">
            <input type="text" name="post_author" class="form-control" id="" placeholder="author">
            <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
            <input type="file" name="post_image" id="fileToUpload">
            <!-- </form> -->
            <input type="text" name="post_status" class="form-control" id="" placeholder="Status">
                                  
            </div>
                          
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
        <?php endif ;?>
    </div>
</div>   
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
                            	$post_query ="SELECT * FROM `POSTS` LEFT JOIN CATEGORIES ON posts.post_category_id = categories.cat_id";
                            	$result = connection_query($post_query);
                            	if($result->num_rows > 0):
                            	?>
                            	<?php while ($row = mysqli_fetch_assoc($result)) {?>
                            		<tr>
                            	<td><?php echo $row['post_id']; ?></td>
                            	<td><?php echo $row['post_title']; ?></td>
                            	<td><?php echo $row['post_category_id']; ?></td>
                            	<td><?php echo $row['post_author']; ?></td>

                            	
                            		<?php
                            		$postImage = $row['post_image'];
                            		?>
                            		 <td>
                            		 <?php if ($postImage): ?>
                                        <img src="/my-work/html-templates/uploads/posts/<?php echo $row['post_image']; ?>" alt="<?php echo $row['post_title']; ?>" width="100">
                                        <?php else: ?>
                                            image not found
                                        <?php endif ?>
                            		 </td>
                            	<td><?php echo $row['post_status']; ?></td>

								<td><a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF'];?>?edit=<?php echo $row['post_id'];?>" >Edit</a></td>


								<td><a class="btn btn-danger" onclick="return confirm('Delete row = <?php echo $row['post_id'];?>?');
                                 <?php echo $row['post_id'];?>" href="<?php echo $_SERVER['PHP_SELF'];?>?delete=<?php echo $row['post_id'];?>"  >Delete</a></td>
                                        
                                    
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