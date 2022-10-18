<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>

<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $skill2_title = $_POST['skill2_title'];
    if (isset($_GET['edit'])) {


        $skill2_id = $_GET['edit'];
        $skill2_query = "UPDATE skills2 set skill2_title = '$skill2_title' where skill2_id = '$skill2_id'";        
    }
    else{
        $skill2_query = "INSERT INTO skills2 (skill2_title) VALUES ('$skill2_title')";
    }
    run_query($skill2_query);
    redirect($_SERVER['PHP_SELF']);

}


if (isset($_GET['delete'])) {
    // dump_check($_GET);

    $skill2_id = $_GET['delete'];
    $skill2_delete_query = "DELETE FROM skills2 WHERE skill2_id = $skill2_id";

    run_query($skill2_delete_query);
    
    
    redirect($_SERVER['PHP_SELF']);
}




 ?> 
                <div class="row p-5">
                    <div class="col-lg-3 ">
                    </div>
                    <div class="col-lg-8 ">
                        <h1 class="page-header">
                            SKILLS - 2
                        </h1>
                     <div class="row p-5">
                         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                              <table class="table table-hover">


                                  <thead>
                                      <tr>
                                          <th>Id</th>
                                          <th>skill 2</th>
                                          <th>Edit</th>
                                          <th>Delete</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                    $skill2_query = "SELECT * FROM skills2";
                                    $skill2_result = run_query($skill2_query);
                                    
                                    if ($skill2_result->num_rows > 0):
                                    	while($row = mysqli_fetch_assoc($skill2_result)){

                                    ?>
                                          <tr>
                                              <td><?php echo $row['skill2_id'];?></td>
                                              <td><?php echo $row['skill2_title'];?></td>
                                              <td><a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF']; ?>?edit=<?php echo $row['skill2_id']; ?>">Edit</a></td>
                                    <td><a class="btn btn-danger"  href="<?php echo $_SERVER['PHP_SELF']; ?>?delete=<?php echo $row['skill2_id']; ?>" 
                                        onclick="return confirm('Are You Sure ?');">Delete</a></td>
                                          </tr>

                                    <?php } ?>
									<?php endif; ?>


                                  </tbody>
                              </table>
                         </div>

                         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                         	<?php if (isset($_GET['edit'])):

                         		$skill2_id = $_GET['edit'];
                         		$select_skill2_row ="SELECT * FROM skills2 where skill2_id = '$skill2_id'";
                         		$result_skill2_edit = run_query($select_skill2_row);
                         		$edit_cat_row = mysqli_fetch_array($result_skill2_edit);

                         	//	if($result_skill_edit->num_rows >0):
                         	//		while ($row = mysqli_fetch_assoc($result_skill_edit)){?>
                          	
                              <form action="<?php echo $_SERVER['PHP_SELF'];?>?edit=<?php echo $skill2_id;?>" method="POST" role="form">
                              
                                  <div class="form-group">
                                      <label for="">Update skill-2</label>
                                      <input type="text" name="skill2_title" class="form-control" id="<?php echo $skill2_id;?>" placeholder="Title" value="<?php echo $edit_cat_row['skill2_title'];?>">
                                  </div>
                              
                                  <button type="submit" class="btn btn-primary mt-3">Update skill-2</button>
                              </form>
                          <?php  //} 
                      			//endif; ?>
                  <?php else: ?>
                              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" role="form">
                              
                                  <div class="form-group">
                                      <label for=""><h3>Create Skill-2</h3></label>
                                      <input type="text" name="skill2_title" class="form-control" id="" placeholder="Title">
                                  </div>
                              <br>
                                  <button type="submit" class="btn btn-primary">Create Skill-2</button>
                              </form>
                          
                          <?php endif ;?>
                         </div>
                     </div>
                    </div>
                </div>
<?php include "includes/footer.php";?>