<?php include "includes/header.php"; ?>


<?php 
//post (add/edit) methods

if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     echo "<pre>";
//   print_r($_POST);  
//   echo "</pre>";
$category_title = $_POST['category_title'];
if (isset($_GET['edit'])){
    $cat_id = $_GET['edit'];
    $cat_query = "UPDATE categories set cat_title='$category_title' where cat_id = '$cat_id'";
}else{
    $cat_query = "INSERT INTO categories (cat_title) VALUES ('$category_title')";
}

connection_query($cat_query);
redirect("categories.php");

}



// DELETE WORK
if (isset($_GET['delete'])) {
    $cat_id = $_GET['delete'];
    $cat_delete_query= "DELETE from categories where cat_id = '$cat_id'";
    connection_query($cat_delete_query);
    redirect("categories.php");

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
                             Categories
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $get_category_query = "SELECT * FROM categories";
                                $result = connection_query($get_category_query);
                                ?>

                                 <?php if ($result->num_rows > 0 ):  ?>
                                <?php while ($row = mysqli_fetch_assoc($result)){ ?>
                                <?php 
                                // echo "<pre>";
                                // print_r($row);
                                // echo "</pre>";
                                 ?>
                                <tr>
                                    <td><?php echo $row['cat_id'];  ?></td>
                                    <td><?php echo $row['cat_title']; ?></td>
                                    <td><a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF'];  ?>?edit=<?php echo $row['cat_id']; ?>">Edit</a></td>
                                    <td><a class="btn btn-danger"  href="<?php echo $_SERVER['PHP_SELF']; ?>?delete=<?php echo $row['cat_id']; ?>" 
                                        onclick="return confirm('Are You Sure ?');">Delete</a></td>
                                </tr>
                                <?php } ?>
                                 <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-xs-12">

                        <?php 

                        // echo "<pre>";
                        // print_r($_SERVER);
                        // echo "</pre>";

                         ?>
                        <?php if(isset($_GET['edit'])): ?>
                            <!-- INSERT/EDIT FORM { -->
                            <?php 
                            $cat_id =$_GET['edit'];
                            $get_category_query = "SELECT * FROM categories where cat_id = '$cat_id'";
                            $result = connection_query($get_category_query);
                            

                             ?>
                             <!--EDIT FORM-->
                            <?php if($result->num_rows > 0 ):  ?>
                                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>?edit=<?php echo $cat_id;?>" method="POST" role="form">
                                <legend>Update Category</legend>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" id="" placeholder="Input field" name="category_title" value="<?php echo $row['cat_title'];?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </form>
                            <?php } ?>
                            <?php endif; ?>
                            

                        <?php else: ?>
                            <!-- INSERT FORM -->
                            <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST" role="form">
                                <legend>Create Category</legend>
                            
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" id="" placeholder="Input field" name="category_title">
                                </div>
                                <button type="submit" class="btn btn-primary">Create Category</button>
                            </form>
                        <?php endif ;?>
                        <!-- INSERT/EDIT FORM } -->
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php"; ?>