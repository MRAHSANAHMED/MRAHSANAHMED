 <?php 

 if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    $user_image = $_POST['user_image'];

    $user_new_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=> 10));
    

    $user_image_correct = null;
    if (isset($_FILES['user_image'])) {
         //file uploading code start
         $user_image_1 = $_FILES['user_image']['name'];
         $user_image_temp = $_FILES['user_image']['tmp_name'];
         move_uploaded_file($user_image_temp, "../uploads/users/$user_image_1" );
         //file uploading code end

         $user_image_correct = "/uploads/users/$user_image_1";
    }

    // if(isset($_FILES['user_image'])) {
    //     $user_image_name = $_FILES['user_image']['name'];
    //     $user_image_tmpname = $_FILES['user_image']['tmp_name'];
    //     move_uploaded_file($user_image_tmpname, "../uploads/users/$user_image_name");

    //     $user_image = "/uploads/users/$user_image_name";
    // }else{
    //     $user_image = null;
    // }

 // $user_insert_query = "INSERT INTO users (username,user_password,user_firstname,user_lastname,user_email,user_role,user_image) VALUES ("
 //    '$user_name','$user_password','$user_firstname','$user_lastname','$user_email','$user_role','$user_image'";
$user_insert_query = "INSERT INTO users (username,user_password,user_firstname,user_lastname,user_email,user_role,user_image) VALUES (";
$user_insert_query .= "'$user_name',"; 
$user_insert_query .= "'$user_new_password',";
$user_insert_query .= "'$user_firstname',";
$user_insert_query .= "'$user_lastname',";
$user_insert_query .= "'$user_email',";
$user_insert_query .= "'$user_role',";
$user_insert_query .= "'$user_image_correct'";
$user_insert_query .= ")";

$result = connection_query($user_insert_query);
redirect('users.php');

 }



 ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Add user
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <a href="users.php" class="btn btn-primary">Back</a>

        <br><br>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>?source=add" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">NAME</label>
                            <input type="text" class="form-control" id="" placeholder="Name" name="username">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="" placeholder="Password" name="user_password">
                                    
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" id="" placeholder="First Name" name="user_firstname">
                        </div>

                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" id="" placeholder="Last Name" name="user_lastname">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="" placeholder="Email" name="user_email">
                        </div>

                        
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    

                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="user_role" id="input" class="form-control" required="required">
                                <option value="">Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                                <option value="subscriber">Subscriber</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">User Image</label>
                           <input type="file" class="form-control" id="" placeholder="User Image" name="user_image">
                        </div>
                       
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="create_user">Submit</button>
        </form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->