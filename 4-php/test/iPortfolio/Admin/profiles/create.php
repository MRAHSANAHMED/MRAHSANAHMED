 <?php 

 if($_SERVER['REQUEST_METHOD'] == "POST"){
    $profile_name = $_POST['profile_name'];
    $profile_password = $_POST['profile_password'];
    $profile_category = $_POST['profile_category'];
    $profile_contact = $_POST['profile_contact'];
    $profile_email = $_POST['profile_email'];
    $profile_skill = $_POST['profile_skill'];
    $profile_skill2 = $_POST['profile_skill2'];
    $profile_content = $_POST['profile_content'];
    $profile_image = $_POST['profile_image'];

    $profile_new_password = password_hash($profile_password, PASSWORD_BCRYPT, array('cost'=> 10));
    

    $profile_image_correct = null;
    if (isset($_FILES['profile_image'])) {
         //file uploading code start
         $profile_image_1 = $_FILES['profile_image']['name'];
         $profile_image_temp = $_FILES['profile_image']['tmp_name'];
         move_uploaded_file($profile_image_temp, "../includes/uploads/profile-images/$profile_image_1");
         //file uploading code end

         $profile_image_correct = "/includes/uploads/profile-images/$profile_image_1";
         // check($profile_skill);
// die();
    }

    // if(isset($_FILES['profile_image'])) {
    //     $profile_image_name = $_FILES['profile_image']['name'];
    //     $profile_image_tmpname = $_FILES['profile_image']['tmp_name'];
    //     move_uploaded_file($profile_image_tmpname, "../uploads/profiles/$profile_image_name");

    //     $profile_image = "/uploads/profiles/$profile_image_name";
    // }else{
    //     $profile_image = null;
    // }

 // $profile_insert_query = "INSERT INTO profiles (profilename,profile_password,profile_firstname,profile_lastname,profile_email,profile_role,profile_image) VALUES ("
 //    '$profile_name','$profile_password','$profile_firstname','$profile_lastname','$profile_email','$profile_role','$profile_image'";
$profile_insert_query = "INSERT INTO profiles (profile_name,profile_password,profile_category,profile_contact,profile_email,profile_skill,profile_skill2,profile_content,profile_image) VALUES (";
$profile_insert_query .= "'$profile_name',"; 
$profile_insert_query .= "'$profile_new_password',";
$profile_insert_query .= "'$profile_category',";
$profile_insert_query .= "'$profile_contact',";
$profile_insert_query .= "'$profile_email',";
$profile_insert_query .= "'$profile_skill',";
$profile_insert_query .= "'$profile_skill2',";
$profile_insert_query .= "'$profile_content',";
$profile_insert_query .= "'$profile_image_correct'";
$profile_insert_query .= ")";

$result = run_query($profile_insert_query);



redirect('profiles.php');

 }



 ?>

<div id="page-wrapper ">

    <div class="container-fluid ">

        <!-- Page Heading -->
        <div class="row d-flex justify-content-end">
            <div class="col-lg-9 d-flex justify-content-center">
                <h1 class="page-header ">
                   Add Profile
                </h1>
            </div>
        </div>
        <!-- /.row -->


        <br><br>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>?source=add" method="post" enctype="multipart/form-data">
            <div class="row d-flex justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                        <div class="form-group">
                            <label for="">NAME</label>
                            <input type="text" class="form-control" id="" placeholder="Name" name="profile_name">
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" id="" placeholder="Password" name="profile_password">
                                    
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">work style</label>
                            <select name="profile_category" id="input" class="form-control" >
                                <option value="">work style</option>
                                <option value="frontend">frontend</option>
                                <option value="backend">backend</option>
                                <option value="designer">designer</option>
                                <option value="animator">animator</option>
                                <option value="automation">automation</option>
                  </select>
                        </div>

                        <div class="form-group">
                            <label for="">contact</label>
                            <input type="text" class="form-control" id="" placeholder="Profile Contact" name="profile_contact">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="" placeholder="Email" name="profile_email">
                        </div>

                        
               
                    

                         <div class="form-group mb-3">
                            <label for="">Service Category</label>
                            <select name="profile_skill" id="input" class="form-control" >
                                <option value="">Select Skills</option>
                                     <?php
                                    $skills_query = "SELECT * FROM skills";
                                    $result = run_query($skills_query); 
                                    ?>
                                   <?php if ($result->num_rows > 0): ?>
                                     <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                            <option value="<?php echo $row['skill_id']; ?>">
                                                <?php echo $row['skill_title']; ?>        
                                            </option>
                                     <?php } ?>
                                 <?php endif ?>
                                    
                            </select>
                        </div>
                         <div class="form-group mb-3">
                            <label for="">Service Category</label>
                            <select name="profile_skill2" id="input" class="form-control" >
                                <option value="">Select Skills</option>
                                     <?php
                                    $skills2_query = "SELECT * FROM skills2";
                                    $result = run_query($skills2_query); 
                                    ?>
                                   <?php if ($result->num_rows > 0): ?>
                                     <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                            <option value="<?php echo $row['skill2_id']; ?>">
                                                <?php echo $row['skill2_title']; ?>        
                                            </option>
                                     <?php } ?>
                                 <?php endif ?>
                                    
                            </select>
                        </div>
                        <form>
                            <label for="">Expertises</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Expertises" id="demo" name="profile_content" >
                              <div class="input-group-append">
                              </div>
                            </div>
                          </form>

                        <div class="form-group">
                            <label for="">profile Image</label>
                           <input type="file" class="form-control" id="" placeholder="profile Image" name="profile_image">
                        </div>
                        <br>
            
                        <div>
                        <button type="submit" class="btn btn-primary" name="create_profile">Submit</button>

                        <br><br>
                        <a href="profiles.php" class="btn btn-dark " >Back</a>
                </div></div>
        


            </div>
            
        </form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->