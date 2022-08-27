<?php 

if (isset($_GET['delete'])) {
        $post_id = $_GET['delete'];

        $post_delete_query = "DELETE from posts where posts.post_id = '$post_id'";

        $result = connection_query($post_delete_query);
   redirect('posts.php');

}

?>


<!-- Page Heading -->
<div class="row">
   <div class="col-lg-12">
      <h1 class="page-header">
         Posts
      </h1>
      <div class="row" style="margin-bottom: 20px;">
         <div class="col-lg-12">
            <a href="?source=add" class="btn btn-primary mb-2">Add Post</a>
         </div>
      </div>
      <table class="table table-bordered table-hover">
         <thead>
            <tr>
               <th>Id</th>
               <th>Author</th>
               <th>Title</th>
               <th>Category</th>
               <th>Status</th>
               <th>Image</th>
               <th>Date</th>
               <th>Edit</th>
               <th>Delete</th>
            </tr>
         </thead>
         <tbody>
            <?php 
            $post_query = "SELECT * FROM Posts left join categories on posts.post_category_id = categories.cat_id order by posts.post_id DESC";
            $result = connection_query($post_query);

            ?>
                    <?php if ($result->num_rows > 0 ):?>
                     <?php while($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                        <td><?php echo $row['post_id']; ?></td>
                        <td><?php echo $row['post_author']; ?></td>
                        <td><?php echo $row['post_title']; ?></td>
                        <td><?php echo $row['cat_title']; ?></td>
                        <td><?php echo $row['post_status']; ?></td>
                        <td><?php 
                        if ($row['post_image']):?>
                           <img width="80" src="/my-work/html-templates/uploads/posts/<?php echo $row['post_image'];?>" alt="<?php echo " image not found "?>">

                        <?php else :?>

                            <h4>no image</h4>
                         <?php endif ?>
                        </td>
                        <td><?php echo $row['post_date']; ?></td>
                        <td><a href="?source=edit&edit=<?php echo $row['post_id']?>" class="btn btn-primary" onclick="return confirm(<?php echo $row['post_id'];?>)">Edit</a></td>
                        <td><a href="?delete=<?php echo $row['post_id'];?>" class="btn btn-danger" onclick="return confirm(<?php echo $row['post_id'];?>)">Delete</a></td>
                    </tr>
                <?php }?>
             <?php endif ?>
         </tbody>
      </table>
   </div>
</div>
<!-- /.row -->