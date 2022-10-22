<?php 
if(isset($_GET['delete'])) 
{
   $profile_id = $_GET['delete'];

   $old_profile_row = get_single_row('profiles','profile_id',$profile_id);

  

// if(!empty($old_profile_row['profile_image'])){
//    unlink($_SERVER['DOCUMENT_ROOT'] . '/test/iPortfolio/includes/$old_profile_row['profile_image']');
// }


 $profile_delete_query = "DELETE FROM profiles where profiles.profile_id = '$profile_id'";
   $result = run_query($profile_delete_query);
   redirect('profiles.php');



}


?>


<!-- Page Heading -->
<div class="row d-flex justify-content-end mx-5">
   <div class="col-lg-9 col-md-9 col-sm-9">
      <h1 class="page-header mt-5 mr-5">
         profiles
      </h1>
            <a href="?source=add" class="btn btn-primary mb-2 mt-5">Add profile</a>
      
      <table class="table table-bordered table-hover">
         <thead>
            <tr>
               <th>Id</th>
               <th>Profile Name</th>
               <th>Category</th>
               <th>Contact</th>
               <th>E-mail</th>
               <th>Skills</th>
               <th>Expertise Content</th>
               <th>Image</th>
               <th>Edit</th>
               <th>Delete</th>
            </tr>
         </thead>
         <tbody>
            <?php 
               $profile_get_query = "SELECT profiles.profile_id,
                                                   profiles.profile_name,
                                                   profiles.profile_password,
                                                   profiles.profile_category,
                                                   profiles.profile_contact,
                                                   profiles.profile_content,
                                                   profiles.profile_email,
                                                   profiles.profile_skill,
                                                   profiles.profile_skill2,
                                                   profiles.profile_image,
                                                   skills.skill_title,
                                                   skills2.skill2_title
                                 FROM ((profiles
                                 LEFT JOIN skills ON profiles.profile_skill = skills.skill_id)
                                 LEFT JOIN skills2 ON profiles.profile_skill2 = skills2.skill2_id) order by profiles.profile_id DESC";

            // $profile_get_query = "SELECT * FROM profiles left join skills on profiles.profile_skill = skills.skill_id";
               $result = run_query($profile_get_query);
            ?>

            <?php if($result->num_rows > 0):?>
               <?php while($row = mysqli_fetch_assoc($result)) {?>
              <tr>
               <td><?php echo $row['profile_id'];?></td>
               <td><?php echo ucfirst($row['profile_name']);?></td>
               <td><?php echo $row['profile_category'];?></td>
               <td><?php echo $row['profile_contact'];?></td>
               <td><?php echo $row['profile_email'];?></td>
               <td style="color:#dc6806;"><b><?php echo $row['skill_title'] ; ?>/<?php echo $row['skill2_title']; ?></b></td>
               <td class="text-uppercase"><?php echo $row['profile_content'];?></td>

               <td ><?php if (isset($row['profile_image'])):?>
                  <img src="/test/iPortfolio<?php echo $row['profile_image'];?>" style="width:80px;" alt="<?php echo $row['profile_id'];?>">
               <?php else : ?>
                   <p>NO IMAGE</p>
                <?php endif; ?>


               </td>
               <td > <a  class="btn btn-primary " href="?source=edit&edit=<?php echo $row['profile_id']?>">Edit</a></td>
               <td><a class="btn btn-danger" href="?delete=<?php echo $row['profile_id']?>" onclick="return confirm(<?php echo $row['profile_id'];?>)">Delete</a></td>
            </tr>
             <?php }  ?>
             <?php endif;  ?>
         </tbody>
      </table>
      <div class="row" style="margin-bottom: 20px;">
         <div class="col-lg-6 ">
         </div>
      </div>
   </div>
</div>
<!-- /.row -->