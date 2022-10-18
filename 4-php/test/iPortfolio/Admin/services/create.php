
<?php 



 if($_SERVER['REQUEST_METHOD'] == "POST"){

    $service_title = $_POST['service_title'];
    $service_category_id = $_POST['service_category_id'];
    $service2_category_id = $_POST['service2_category_id'];
    $service_content = $_POST['service_content'];
    $service_price = $_POST['service_price'];

    $service_image = null;
    $service_image2 = null;
    if(isset($_FILES['service_image'])) {
        //file uploading code start
        $service_image = $_FILES['service_image']['name'];
        $service_image_temp = $_FILES['service_image']['tmp_name'];
        move_uploaded_file($service_image_temp,"../includes/uploads/services-images/$service_image");
        //file uploading code end
    }
    if ($service_image){
        $service_image2 = "/includes/uploads/services-images/$service_image";
    }
    $service_insert_query = 
    "INSERT INTO services (service_title,service_category_id,service2_category_id,service_content,service_image,service_price) 
            VALUES ('$service_title','$service_category_id','$service2_category_id','$service_content','$service_image2','$service_price')";
    $result = run_query($service_insert_query);

    redirect('services.php');

    check($result);
die();
 }


?>
 <?php ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Add service
                </h1>
            </div>
        </div>
        <!-- /.row -->

        

        <br><br>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>?source=add" method="POST" enctype="multipart/form-data">
            <div class="row d-flex justify-content-end">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">

                <a href="services.php" class="btn btn-primary mb-3">Back</a>

                        <div class="form-group mb-3 ">
                            <label for="">Service Title</label>
                            <input type="text" class="form-control" id="" placeholder="service Title" name="service_title">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Service Category</label>
                            <select name="service_category_id" id="input" class="form-control" >
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
                            <select name="service2_category_id" id="input" class="form-control" >
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

                       

                        <div class="form-group mb-3">
                            <label for="">Service Image</label>
                            <input type="file" name="service_image" >
                        </div>
                

                        <div class="form-group mb-3">
                            <label for="">Service Content</label>
                            <textarea name="service_content" id="input" class="form-control" rows="3" ></textarea>
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="">Service price</label>
                            <input type="text" class="form-control" id="" placeholder="service price" name="service_price">
                        </div>

                <button type="submit" class="btn btn-primary mt-3" name="create_service">Submit</button>
                        
                        </div>

                </div>
            </div>
            
        </form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->