<?php 
$profile_id = null;
if(isset($_GET['edit'])) {
    $profile_id = $_GET['edit'];
}

$old_profile_row = get_single_row('profiles','profiles.profile_id',$profile_id);

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

    $profile_image_correct = $old_profile_row['profile_image'];


    if(!empty($_FILES['profile_image']['name'])) {
        if(isset($old_profile_row['profile_image']) && $_FILES['profile_image']){
            unlink($_SERVER['DOCUMENT_ROOT'] . "/test/iportfolio" . $old_profile_row['profile_image']);
        }

     //file uploading code start
         $profile_image_1 = $_FILES['profile_image']['name'];
         $profile_image_temp = $_FILES['profile_image']['tmp_name'];
         move_uploaded_file($profile_image_temp, "../includes/uploads/profile-images/$profile_image_1");
         $profile_image_correct = "/includes/uploads/profile-images/$profile_image_1";
        
    } 
    


    $profile_update_query = "UPDATE profiles SET ";
    $profile_update_query .= "profile_name = '$profile_name', ";
    if(isset($profile_password)){
         $profile_update_query .= "profile_password = '$profile_new_password', ";   
   }

        $profile_update_query .= "profile_category = '$profile_category',";
        $profile_update_query .= "profile_contact = '$profile_contact',";
        $profile_update_query .= "profile_email = '$profile_email',";
        $profile_update_query .= "profile_skill = '$profile_skill', ";
        $profile_update_query .= "profile_skill2 = '$profile_skill2', ";
        $profile_update_query .= "profile_content = '$profile_content', ";
        $profile_update_query .= "profile_image = '$profile_image_correct'";

        

        $profile_update_query .= "WHERE profiles.profile_id = $profile_id";
    

    $result = run_query($profile_update_query);
    redirect($_SERVER['PHP_SELF']);
dump_check($result);
die();
}

?>



<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row d-flex justify-content-end">
            <div class="col-lg-10 d-flex justify-content-end">
                <h1 class="page-header">
                   Edit profile
                </h1>
            </div>
        </div>
        <!-- /.row -->


        <br><br>
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>?source=edit&edit=<?php echo $profile_id; ?>" method="POST" enctype="multipart/form-data">
            <div class="row d-flex justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="" placeholder="Profile Name" name="profile_name" value="<?php echo $old_profile_row['profile_name']; ?>">
                        </div>

                        <!-- <div class="form-group">
                            <label for="">password</label>
                            <input type="text" class="form-control" id="" placeholder="First Name" name="profile_password" value="<?php echo $old_profile_row['profile_password']; ?>">
                        </div> -->
                         <div class="form-group">
                            <label for="">work style</label>
                            <select name="profile_category" id="input" class="form-control" >
                                <option value="">work style</option>
                                <option value="frontend" <?php echo $old_profile_row['profile_category'] == 'frontend' ? 'selected' : ''; ?>>frontend</option>
                                <option value="backend" <?php echo $old_profile_row['profile_category'] == 'backend' ? 'selected' : ''; ?>>backend</option>
                                <option value="designer" <?php echo $old_profile_row['profile_category'] == 'designer' ? 'selected' : ''; ?>>designer</option>
                                <option value="animator" <?php echo $old_profile_row['profile_category'] == 'animator' ? 'selected' : ''; ?>>animator</option>
                                <option value="automation" <?php echo $old_profile_row['profile_category'] == 'automation' ? 'selected' : ''; ?>>automation</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <input type="text" class="form-control" id="" placeholder="Category" name="profile_category" value="<?php echo $old_profile_row['profile_category']; ?>">
                        </div>
                         <div class="form-group">
                            <label for="">Contact</label>
                            <input type="contact" class="form-control" id="" placeholder="Contact" name="profile_contact" value="<?php echo $old_profile_row['profile_contact']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="" placeholder="Email" name="profile_email" value="<?php echo $old_profile_row['profile_email']; ?>">
                        </div>

              
                       <div class="form-group">
                            <label for="">Service skill</label>
                            <select name="profile_skill" id="input" class="form-control" >
                                <option value="">Select skill</option>
                                <?php
                                    $skills_query = "SELECT * FROM skills";
                                    $result = run_query($skills_query); 
                                    ?>
                                   <?php if ($result->num_rows > 0): ?>
                                     <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                            <option value="<?php echo $row['skill_id']; ?>" 

                                                <?php echo $row['skill_id'] ? 'selected' : ''; ?> >
                                                <?php echo $row['skill_title']; ?>        
                                            </option>
                                     <?php } ?>
                                 <?php endif ?>

                                
                            </select>
                        </div>

                         <div class="form-group">
                            <label for="">Service skill 2</label>
                            <select name="profile_skill2" id="input" class="form-control" >
                                <option value="">Select skill</option>
                                <?php
                                    $skills2_query = "SELECT * FROM skills2";
                                    $result = run_query($skills2_query); 
                                    ?>
                                   <?php if ($result->num_rows > 0): ?>
                                     <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                            <option value="<?php echo $row['skill2_id']; ?>" <?php echo $row['skill2_id'] ? 'selected' : ''; ?> >
                                                <?php echo $row['skill2_title']; ?>   
                                            </option>
                                     <?php } ?>
                                 <?php endif ?>

                                
                            </select>
                        </div>
                        <form>
                            <label for="">Expertises</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Expertises" id="demo" name="profile_content" value="<?php echo $old_profile_row['profile_content'];?>">
                              <div class="input-group-append">
                              </div>
                            </div>
                          </form>

                        <div class="form-group">
                            <label for="">Profile Image</label>
                            <input type="file" class="form-control" id="" placeholder="Profile Image" name="profile_image" >


                             <img src="/test/iPortfolio<?php echo $old_profile_row['profile_image']; ?>" alt="" width="80" style="margin-top: 20px;">

                        </div>

<div>
                        <button type="submit" class="btn btn-primary" name="create_profile">Submit</button>
                            
                        <br><br>
                        <a href="profiles.php" class="btn btn-dark " >Back</a>
                </div>
                </div>

            </div>
              

        </form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->