<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>

<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $skill_title = $_POST['skill_title'];
    if (isset($_GET['edit'])) {


        $skill_id = $_GET['edit'];
        $skill_query = "UPDATE skills set skill_title = '$skill_title' where skill_id = '$skill_id'";        
    }
    else{
        $skill_query = "INSERT INTO skills (skill_title) VALUES ('$skill_title')";
    }
    run_query($skill_query);
    redirect($_SERVER['PHP_SELF']);

}


if (isset($_GET['delete'])) {
    // dump_check($_GET);

    $skill_id = $_GET['delete'];
    $skill_delete_query = "DELETE FROM skills WHERE skill_id=$skill_id";

    run_query($skill_delete_query);
    
    
    redirect($_SERVER['PHP_SELF']);
}




 ?> 
                <div class="row p-5">
                    <div class="col-lg-3 ">
                    </div>
                    <div class="col-lg-8 ">
                        <h1 class="page-header">
                             SKILLS
                        </h1>
                     <div class="row p-5">
                         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <table class="table table-hover">


                                  <thead>
                                      <tr>
                                          <th>Id</th>
                                          <th>Name</th>
                                          <th>Edit</th>
                                          <th>Delete</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                    $skill_query = "SELECT * FROM skillS";
                                    $skill_result = run_query($skill_query);
                                    
                                    if ($skill_result->num_rows > 0):
                                    	while($row = mysqli_fetch_assoc($skill_result)){

                                    ?>
                                          <tr>
                                              <td><?php echo $row['skill_id'];?></td>
                                              <td><?php echo $row['skill_title'];?></td>
                                              <td><a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF']; ?>?edit=<?php echo $row['skill_id']; ?>">Edit</a></td>
                                    <td><a class="btn btn-danger"  href="<?php echo $_SERVER['PHP_SELF']; ?>?delete=<?php echo $row['skill_id']; ?>" 
                                        onclick="return confirm('Are You Sure ?');">Delete</a></td>
                                          </tr>

                                    <?php } ?>
									<?php endif; ?>


                                  </tbody>
                              </table>
                         </div>

                         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                         	<?php if (isset($_GET['edit'])):

                         		$skill_id = $_GET['edit'];
                         		$select_skill_row ="SELECT * FROM skillS where skill_id = '$skill_id'";
                         		$result_skill_edit = run_query($select_skill_row);
                         		$edit_cat_row = mysqli_fetch_array($result_skill_edit);

                         	//	if($result_skill_edit->num_rows >0):
                         	//		while ($row = mysqli_fetch_assoc($result_skill_edit)){?>
                          	
                              <form action="<?php echo $_SERVER['PHP_SELF'];?>?edit=<?php echo $skill_id;?>" method="POST" role="form">
                              
                                  <div class="form-group">
                                      <label for="">Update skill</label>
                                      <input type="text" name="skill_title" class="form-control" id="<?php echo $skill_id;?>" placeholder="Title" value="<?php echo $edit_cat_row['skill_title'];?>">
                                  </div>
                              
                                  <button type="submit" class="btn btn-primary mt-3">Update skill</button>
                              </form>
                          <?php  //} 
                      			//endif; ?>
                  <?php else: ?>
                              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" role="form">
                              
                                  <div class="form-group">
                                      <label for=""><h3>Create Skill</h3></label>
                                      <input type="text" name="skill_title" class="form-control" id="" placeholder="Title">
                                  </div>
                              <br>
                                  <button type="submit" class="btn btn-primary">Create Skill</button>
                              </form>
                          
                          <?php endif ;?>
                         </div>
                     </div>
                    </div>
                </div>
<?php include "includes/footer.php";?>