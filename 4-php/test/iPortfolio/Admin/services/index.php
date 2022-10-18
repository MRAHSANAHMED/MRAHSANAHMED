<?php 

if (isset($_GET['delete'])) {
        $service_id = $_GET['delete'];

        $service_delete_query = "DELETE from services where services.service_id = '$service_id'";

        $result = run_query($service_delete_query);
   redirect('services.php');

}

?>


<!-- Page Heading -->
<div class="row d-flex justify-content-end">
   <div class="col-lg-10 ">
      
      
      <table class="table table-bordered table-hover ">

         <div class="row" style="margin-top: 120px;">

         <div class="col-lg-10 d-flex justify-content-end">
            <h1 class="page-header">
         Services
      </h1>
            <a href="?source=add" class="btn btn-primary mb-2 mt-5">Add service</a>

         </div>
      </div>

         <thead>
            <tr>
               <th>Id</th>
               <th >Title</th>
               <th>Category</th>
               <th>Category2</th>
               <th style="width:150px;">Content</th>
               <th>Image</th>
               <th>Price</th>
               <th>Edit</th>
               <th>Delete</th>
            </tr>
         <tbody>
            <?php 

                        $service_query = " SELECT services.service_id,
                                                   services.service_title,
                                                   services.service_category_id,
                                                   services.service2_category_id,
                                                   services.service_content,
                                                   services.service_image,
                                                   services.service_price,
                                                   skills.skill_title,
                                                   skills2.skill2_title
                                 FROM ((services
                                 LEFT JOIN skills ON services.service_category_id = skills.skill_id)
                                 LEFT JOIN skills2 ON services.service2_category_id = skills2.skill2_id) order by services.service_id DESC
                                 ";
            $result = run_query($service_query);
            // $service2_query = "SELECT * FROM services left join skills2 on services.service_category_id = skills2.skill2_id order by services.service_id DESC";
            // $result2 = run_query($service2_query);

            ?>
                    <?php if ($result->num_rows > 0 ):?>
                     <?php while($row = mysqli_fetch_assoc($result)) {?> 
                        
                    <tr>
                        <td  style="border-bottom: solid red 3px;"><?php echo $row['service_id']; ?></td>
                        <td class="text-capitalize"><?php echo $row['service_title']; ?></td>
                        <td class="text-capitalize"><?php echo $row['skill_title']; ?></td>
                        <td class="text-capitalize"><?php echo $row['skill2_title']; ?></td>
                        <td class="text-capitalize" width="300px"><?php echo $row['service_content']; ?></td>
                        <td><?php 
                        if ($row['service_image']):?>
                           <img width="120px" src="/test/iPortfolio<?php echo $row['service_image'];?>" alt="<?php echo $row['service_id'];?>">

                        <?php else :?>

                            <h4>no image</h4>
                         <?php endif ?>
                        </td>
                        <td class="text-capitalize"><?php echo $row['service_price']; ?></td>

                        <td><a href="?source=edit&edit=<?php echo $row['service_id']?>" class="btn btn-primary" onclick="return confirm(<?php echo $row['service_id'];?>)">Edit</a></td>
                        <td><a href="?delete=<?php echo $row['service_id'];?>" class="btn btn-danger" onclick="return confirm(<?php echo $row['service_id'];?>)">Delete</a></td>
                    </tr>
             
                <?php }?>
             <?php endif ?>
         </tbody>
      </table>
   </div>
</div>
<!-- /.row -->