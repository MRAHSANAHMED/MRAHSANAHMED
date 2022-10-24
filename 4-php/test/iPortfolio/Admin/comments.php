<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>



<?php 


if (!empty($_GET['status']) && isset($_GET['status'])) {
    $status = $_GET['status'];
    $comment_id = $_GET['comment_id'];

    $update_status_query = "UPDATE comments set comments.comment_status = '$status' where comments.comment_id = '$comment_id'";

    run_query($update_status_query);
    redirect($_SERVER['PHP_SELF']);
}


if (!empty($_GET['delete']) && isset($_GET['delete'])) {
    $comment_id = $_GET['delete'];

    $delete_query = "DELETE FROM comments WHERE comments.comment_id = '$comment_id'";

    run_query($delete_query);
    redirect($_SERVER['PHP_SELF']);
}

 ?>



<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // dump_check($_POST);

    $bulk_options = $_POST['bulk_options'];
    $checkBoxArray = $_POST['checkBoxArray'];

    foreach ($checkBoxArray as $singleCheckbox) {
        $comment_id = $singleCheckbox;

        if ($bulk_options == 'delete') {
            $bulk_option_query = "DELETE FROM comments WHERE comments.comment_id = '$comment_id'";
        }else{
            $bulk_option_query = "UPDATE comments set comments.comment_status = '$bulk_options' where comments.comment_id = '$comment_id'";
        }

        run_query($bulk_option_query);
    }

    redirect($_SERVER['PHP_SELF']);

    
}

 ?>
<style type="text/css">
#bulkOptionContainer {
    padding-left: 0px;
    margin-bottom: 20px;
}
</style>
<div id="page-wrapper">
    <div class="container-fluid ">
        <!-- Page Heading -->
        <div class="row d-flex justify-content-end mt-5">
            <div class="col-lg-10 mt-5">
                <h1 class="page-header  mt-5">Comments</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div id="bulkOptionContainer" class="col-lg-5">
                        <select class="form-control" name="bulk_options" id="">
                            <option value="">Select Options</option>
                            <option value="approved">Approve</option>
                            <option value="unapproved">Unapprove</option>
                            <option value="delete">Delete</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success">Apply</button>
                    </div>
                    <table class="table table-bordered table-hover">
                        <br><br>
                        <thead>
                            <tr>
                                <th><input id="selectAllBoxes" type="checkbox"></th>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Profile-ID</th>
                                <th>Profile-NAME</th>
                                <th>Status</th>
                                <th>Comment-Rate</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                            $get_comments = "select * from comments left join profiles on comments.profile_id = profiles.profile_id ORDER BY comments.comment_id DESC"; 
                            // left join services on comments.service_id = services.service_id"; 
                            $result = run_query($get_comments);
                            if ($result->num_rows > 0):  
                                while($row = mysqli_fetch_assoc($result)){ 
                                // dump_check($row);
                                $comment_id = $row['comment_id'];
                                $customer_name = $row['customer_name'];
                                $comment_content = $row['comment_content'];
                                $profile_id = $row['profile_id'];
                                $profile_name = $row['profile_name'];
                                $comment_status = $row['comment_status'];
                                $comment_rate = $row['comment_rate'];

                                $comment_date = convertDate($row['created_at']);;


                                $comment_status_color = '';

                                switch ($comment_status) {
                                    case 'approved':
                                        $comment_status_color = 'green';
                                        break;
                                    case 'unapproved':
                                        $comment_status_color = 'red';
                                        break;    
                                    
                                    default:
                                        $comment_status_color = 'orange';
                                        break;
                                }

                            ?>  
                    <tr>
                        <td><input class="rowCheckbox" id="allboxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $comment_id; ?>"></td>
                        <td><?php echo $comment_id; ?></td>
                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $comment_content; ?></td>
                        <td><?php echo $profile_id; ?></td>
                        <td><?php echo $profile_name; ?></td>
                        <td style="color: <?php echo $comment_status_color; ?>"><?php echo $comment_status; ?></td>
                        <td><?php echo $comment_rate; ?></td>
                        <td><?php echo $comment_date; ?></td>

                        <td><a href="?status=approved&comment_id=<?php echo $comment_id; ?>" class="btn btn-primary">Approve</a></td>
                        <td><a href="?status=unapproved&comment_id=<?php echo $comment_id; ?>" class="btn btn-warning">Unapprove</a></td>
                        <td><a 
                            href="?delete=<?php echo $comment_id; ?>" 
                            class="btn btn-danger"
                            onclick="return confirm('Are You Sure? ')">Delete</a></td>
                    </tr>
                    <?php } 
                    endif ?>
                        </tbody>    
                    </table>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>


<?php include "includes/footer.php"; ?>