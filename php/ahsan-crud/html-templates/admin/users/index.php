<?php 
if(isset($_GET['delete'])) {
   $user_id = $_GET['delete'];

   $old_user_row = get_single_row('users','user_id',$user_id);

  

if(!empty($old_user_row['user_image'])){
   unlink($_SERVER['DOCUMENT_ROOT'] . BASE_URL . $old_user_row['user_image']);
}


 $user_delete_query = "DELETE FROM users where users.user_id = '$user_id'";
   $result = connection_query($user_delete_query);
   redirect(BASE_URL . "users.php");



}


?>


<!-- Page Heading -->
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
         USERS
      </h1>
      <div class="row" style="margin-bottom: 20px;">
         <div class="col-lg-12">
            <a href="?source=add" class="btn btn-primary mb-2">Add User</a>
         </div>
      </div>
      <table class="table table-bordered table-hover">
         <thead>
            <tr>
               <th>Id</th>
               <th>User Name</th>
               <th>Full Name</th>
               <th>E-mail</th>
               <th>Role</th>
               <th>Image</th>
               <th>Edit</th>
               <th>Delete</th>
            </tr>
         </thead>
         <tbody>
            <?php 
               $user_get_query = "SELECT * from users order by users.user_id DESC";
               $result = connection_query($user_get_query);
            ?>

            <?php if($result->num_rows > 0):?>
               <?php while($row = mysqli_fetch_assoc($result)) {?>
              <tr>
               <td><?php echo $row['user_id'];?></td>
               <td><?php echo ucfirst($row['username']);?></td>
               <td><?php echo ucfirst($row['user_firstname']);?><?php echo ucfirst($row['user_lastname']);?></td>
               <td><?php echo $row['user_email'];?></td>
               <td><?php echo $row['user_role'];?></td>

               <td><?php if (isset($row['user_image'])):?>
                  <img src="/my-work/html-templates<?php echo $row['user_image'];?>" width="80px" alt="">
               <?php else : ?>
                   <p>NO IMAGE</p>
                <?php endif; ?>


               </td>
               <td> <a class="btn btn-primary" href="?source=edit&edit=<?php echo $row['user_id']?>">Edit</a></td>
               <td><a class="btn btn-danger" href="?delete=<?php echo $row['user_id']?>" onclick="return confirm(<?php echo $row['user_id'];?>)">Delete</a></td>
            </tr>
             <?php }  ?>
             <?php endif;  ?>
         </tbody>
      </table>
   </div>
</div>
<!-- /.row -->