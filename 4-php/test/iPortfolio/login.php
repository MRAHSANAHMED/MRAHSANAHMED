<?php include "includes/header.php"; ?>


<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$input_profile_name = $_POST['profile_name'];
	$input_password = $_POST['password'];


	$get_user_row = "Select * from profiles where profiles.profile_name = '$input_profile_name'";
	$result = run_query($get_user_row);
	$row = mysqli_fetch_array($result);

	$db_password = $row['profile_password'];
	$db_profile_name = $row['profile_name'];
	$db_profile_id = $row['profile_id'];
	$db_profile_email = $row['profile_email'];

	if (password_verify($input_password, $db_password)) {
		//Login
		$_SESSION['profile_id'] = $db_profile_id;
		$_SESSION['profile_name'] = $db_profile_name;
		$_SESSION['profile_email'] = $db_profile_email;
		return redirect('/test/iportfolio/index.php');
	}else{
		return redirect('/test/iportfolio/login.php');
	}
}

 ?>

<div class="container">
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-profile_ fa-4x"></i></h3>
                            <h2 class="text-center">Login 
                                here
                            </h2>
                            <div class="panel-body">
                                <form id="login-form" role="form" autocomplete="off" class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-profile_ color-blue"></i></span>
                                            <input name="profile_name" type="text" class="form-control" placeholder="Enter profile_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                            <input name="password" type="password" class="form-control" placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit"> -->
                                        <button type="submit" class="btn btn-lg btn-primary btn-block mt-5">Login</button>
                                    </div>
                                </form>
                            </div><!-- Body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>