<?php 
$service_id = isset($_GET['edit']) ? $_GET['edit']: null;


// $get_service_row_query = "SELECT * FROM services where services.service_id = $service_id";
// $result = connection_query($get_service_row_query);
// $service_row = mysqli_fetch_array($result);
 
$service_row = get_single_row('services','services.service_id',$service_id);
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $service_title = $_POST['service_title'] ?? null;
    $service_category_id = $_POST['service_category_id'] ?? null;
    $service2_category_id = $_POST['service2_category_id'] ?? null;
    $service_content = $_POST['service_content'] ?? null;




    $service_image = null;
    $service_image_db_name = $service_row['service_image'];
    if(!empty($_FILES['service_image'])) {
        unlink($_SERVER['DOCUMENT_ROOT'] . '/test/iportfolio/includes/uploads/services-images' . $service_row['service_image']);

// dump_check($_SERVER['DOCUMENT_ROOT']);
// die();
         $service_image = $_FILES['service_image']['name'];
         $service_image_temp = $_FILES['service_image']['tmp_name'];
          move_uploaded_file($service_image_temp,"../includes/uploads/services-images/$service_image");
    }
if($service_image){
    $service_image_db_name = "/includes/uploads/services-images/$service_image";
}


 $update_query = "UPDATE services set
                   services.service_title= '$service_title',
                   services.service_category_id = '$service_category_id',
                   services.service2_category_id = '$service2_category_id',
                   services.service_content = '$service_content',
                   services.service_image = '$service_image_db_name'
                                  where  services.service_id='$service_id' order by services.service_id DESC";
    $result = run_query($update_query);
    redirect('services.php');


    }

    

   
   


?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Edit service
                </h1>
            </div>
        </div>
        <!-- /.row -->

        
        <br><br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>?source=edit&edit=<?php echo $service_row['service_id']; ?>" method="POST" enctype="multipart/form-data">
             <div class="row d-flex justify-content-end">

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <a href="services.php" class="btn btn-primary">Back</a>
                <?php             //check($_GET['service_id']);
 ?>
                        <div class="form-group">
                            <label for="">service Title</label>
                            <input type="text" class="form-control" id="" placeholder="service Title" name="service_title" value="<?php echo $service_row['service_title'];?>">
                        </div>

                        <div class="form-group">
                            <label for="">Service Category</label>
                            <select name="service_category_id" id="input" class="form-control" >
                                <option value="">Select Category</option>
                                <?php
                                    $skills_query = "SELECT * FROM skills";
                                    $result = run_query($skills_query); 
                                    ?>
                                   <?php if ($result->num_rows > 0): ?>
                                     <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                            <option value="<?php echo $row['skill_id']; ?>" 

                                                <?php echo $service_row['service_category_id'] == $row['skill_id'] ? 'selected' : ''; ?> >
                                                <?php echo $row['skill_title']; ?>        
                                            </option>
                                     <?php } ?>
                                 <?php endif ?>

                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Service Category 2</label>
                            <select name="service2_category_id" id="input" class="form-control" >
                                <option value="">Select Category</option>
                                <?php
                                    $skills2_query = "SELECT * FROM skills2";
                                    $result = run_query($skills2_query); 
                                    ?>
                                   <?php if ($result->num_rows > 0): ?>
                                     <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                            <option value="<?php echo $row['skill2_id']; ?>" <?php echo $service_row['service2_category_id'] == $row['skill2_id'] ? 'selected' : ''; ?> >
                                                <?php echo $row['skill2_title']; ?>   
                                            </option>
                                     <?php } ?>
                                 <?php endif ?>

                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">service Content</label>
                            <textarea name="service_content" id="input" class="form-control" rows="3"><?php echo $service_row['service_content']; ?></textarea>
                        </div>

                        

                        <div class="form-group">
                            <label for="">service Image</label>
                            <input type="file" name="service_image">
                             <img src="/test/iPortfolio/includes/uploads/services-images<?php echo $service_row['service_image']; ?>" alt="" >

                        </div>
            <button type="submit" class="btn btn-primary" name="create_service">Submit</button>

                </div>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->