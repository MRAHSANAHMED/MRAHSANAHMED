<?php 
$user_id = null;
if(isset($_GET['edit'])) {
    $user_id = $_GET['edit'];
}

$old_user_row = get_single_row('users','users.user_id',$user_id);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    

    $user_new_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost'=> 10));

    $user_image_correct = $old_user_row['user_image'];


    if(!empty($_FILES['user_image']['name'])) {
        if(isset($old_user_row['user_image']) && $_FILES['user_image']){
            unlink($_SERVER['DOCUMENT_ROOT'] . "/my-work/html-templates/uploads/users/" . $old_user_row['user_image']);
        }

     //file uploading code start
         $user_image_1 = $_FILES['user_image']['name'];
         $user_image_temp = $_FILES['user_image']['tmp_name'];
         move_uploaded_file($user_image_temp, "../uploads/users/$user_image_1");
         $user_image_correct = "/uploads/users/$user_image_1";
        
    } 
    


    $user_update_query = "UPDATE users SET ";
    $user_update_query .= "username = '$user_name', ";
    if(isset($user_password)){
         $user_update_query .= "user_password = '$user_new_password', ";   
   }

        $user_update_query .= "user_firstname = '$user_firstname',";
        $user_update_query .= "user_lastname = '$user_lastname',";
        $user_update_query .= "user_email = '$user_email',";
        $user_update_query .= "user_role = '$user_role', ";
        $user_update_query .= "user_image = '$user_image_correct'";

        

        $user_update_query .= "WHERE users.user_id = $user_id";
    

    $result = connection_query($user_update_query);
    redirect($_SERVER['PHP_SELF']);
dump_check($result);
die();
}

?>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Edit user
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <a href="users.php" class="btn btn-primary">Back</a>

        <br><br>
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>?source=edit&edit=<?php echo $user_id; ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="" placeholder="User Name" name="username" value="<?php echo $old_user_row['username']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" id="" placeholder="First Name" name="user_firstname" value="<?php echo $old_user_row['user_firstname']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" id="" placeholder="Last Name" name="user_lastname" value="<?php echo $old_user_row['user_lastname']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="" placeholder="Email" name="user_email" value="<?php echo $old_user_row['user_email']; ?>">
                        </div>

                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    

                        
                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="user_role" id="input" class="form-control" required="required">
                                <option value="">Role</option>
                                <option value="admin" <?php echo $old_user_row['user_role'] == 'admin' ? 'selected': null; ?>>Admin</option>
                                <option value="user" <?php echo $old_user_row['user_role'] == 'user' ? 'selected': null; ?>>User</option>
                                <option value="Subscriber" <?php echo $old_user_row['user_role'] == 'Subscriber' ? 'selected': null; ?>>Subscriber</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="">User Image</label>
                            <input type="file" class="form-control" id="" placeholder="User Image" name="user_image" >


                             <img src="/my-work/html-templates<?php echo $old_user_row['user_image']; ?>" alt="" width="80" style="margin-top: 20px;">
                        </div>




                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="" placeholder="User Password" name="user_password">
                        </div>


                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="create_post">Submit</button>
        </form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->