<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>
<!-- End Header -->



<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $customer_name = $_POST['customer_name'];
    if (isset($_GET['edit'])) {


        $customer_id = $_GET['edit'];
        $customer_query = "UPDATE customer set customer_name = '$customer_name' where customer_id = '$customer_id'";        
    }
    else{
        $customer_query = "INSERT INTO customer (customer_name) VALUES ('$customer_name')";
    }
    run_query($customer_query);
    redirect($_SERVER['PHP_SELF']);

}


if (isset($_GET['delete'])) {
    // dump_check($_GET);

    $customer_id = $_GET['delete'];
    $customer_delete_query = "DELETE FROM customer WHERE customer_id=$customer_id";

    run_query($customer_delete_query);
    
    
    redirect($_SERVER['PHP_SELF']);
}




 ?> 
                <div class="row p-5">
                    <div class="col-lg-3 ">
                    </div>
                    <div class="col-lg-8 ">
                        <h1 class="page-header">
                             customer
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
                                    $customer_query = "SELECT * FROM customer";
                                    $customer_result = run_query($customer_query);
                                    
                                    if ($customer_result->num_rows > 0):
                                    	while($row = mysqli_fetch_assoc($customer_result)){

                                    ?>
                                          <tr>
                                              <td><?php echo $row['customer_id'];?></td>
                                              <td><?php echo $row['customer_name'];?></td>
                                              <td><a class="btn btn-primary" href="<?php echo $_SERVER['PHP_SELF']; ?>?edit=<?php echo $row['customer_id']; ?>">Edit</a></td>
                                    <td><a class="btn btn-danger"  href="<?php echo $_SERVER['PHP_SELF']; ?>?delete=<?php echo $row['customer_id']; ?>" 
                                        onclick="return confirm('Are You Sure ?');">Delete</a></td>
                                          </tr>

                                    <?php } ?>
									<?php endif; ?>


                                  </tbody>
                              </table>
                         </div>

                         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
                         	<?php if (isset($_GET['edit'])):

                         		$customer_id = $_GET['edit'];
                         		$select_customer_row ="SELECT * FROM customer where customer_id = '$customer_id'";
                         		$result_customer_edit = run_query($select_customer_row);
                         		$edit_cat_row = mysqli_fetch_array($result_customer_edit);

                         	//	if($result_customer_edit->num_rows >0):
                         	//		while ($row = mysqli_fetch_assoc($result_customer_edit)){?>
                          	
                              <form action="<?php echo $_SERVER['PHP_SELF'];?>?edit=<?php echo $customer_id;?>" method="POST" role="form">
                              
                                  <div class="form-group">
                                      <label for="">Update customer</label>
                                      <input type="text" name="customer_name" class="form-control" id="<?php echo $customer_id;?>" placeholder="name" value="<?php echo $edit_cat_row['customer_name'];?>">
                                  </div>
                              
                                  <button type="submit" class="btn btn-primary mt-3">Update customer</button>
                              </form>
                          <?php  //} 
                      			//endif; ?>
                  <?php else: ?>
                              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" role="form">
                              
                                  <div class="form-group">
                                      <label for=""><h3>Create customer</h3></label>
                                      <input type="text" name="customer_name" class="form-control" id="" placeholder="name">
                                  </div>
                              <br>
                                  <button type="submit" class="btn btn-primary">Create customer</button>
                              </form>
                          
                          <?php endif ;?>
                         </div>
                     </div>
                    </div>
                </div>
<?php include "includes/footer.php";?>