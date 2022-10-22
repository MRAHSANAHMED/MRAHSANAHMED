<?php include "includes/header.php"; ?>


<?php 
$session_id = @$_SESSION['profile_id'];
if(isset($session_id)){
header('Location:index.php');
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$input_profile_name = $_POST['profile_name'];
	$input_password = $_POST['password'];

    
	$get_user_row = "Select * from (profiles,services)
                    left join skills on profiles.profile_skill = skills.skill_id
                    left join skills2 on profiles.profile_skill2 = skills2.skill2_id 
                    where profiles.profile_name = '$input_profile_name'";
	$result = run_query($get_user_row);
	$row = mysqli_fetch_array($result);
	$db_password = $row['profile_password'];
	$db_profile_name = $row['profile_name'];
	$db_profile_id = $row['profile_id'];
	$db_profile_email = $row['profile_email'];
	$db_profile_contact = $row['profile_contact'];
	$db_profile_image = $row['profile_image'];
	$db_profile_skill = $row['profile_skill'];
	$db_profile_skill2 = $row['profile_skill2'];
	$db_profile_category = $row['profile_category'];
	$db_profile_content = $row['profile_content'];
	$db_profile_skill_title = $row['skill_title'];
	$db_profile_skill2_title = $row['skill2_title'];
	$db_service_title = $row['service_title'];
	if (password_verify($input_password, $db_password)) {
		$_SESSION['profile_id'] = $db_profile_id;
		$_SESSION['profile_name'] = $db_profile_name;
		$_SESSION['profile_email'] = $db_profile_email;
		$_SESSION['profile_contact'] = $db_profile_contact;
		$_SESSION['profile_image'] = $db_profile_image;
		$_SESSION['profile_skill'] = $db_profile_skill;
		$_SESSION['profile_skill2'] = $db_profile_skill2;
		$_SESSION['profile_category'] = $db_profile_category;
		$_SESSION['profile_content'] = $db_profile_content;
		$_SESSION['skill_title'] = $db_profile_skill_title;
		$_SESSION['skill2_title'] = $db_profile_skill2_title;
		return redirect('/test/iportfolio/index.php');
	}else{
		return redirect('/test/iportfolio/login.php');
	}
}

 ?>
<div class="d-flex col-12 justify-content-around">
    <div>
        <h4>name= ahsan</h4>
        <p>password= 123</p>
    </div>
    <div>
        <h4>name= khizar</h4>
        <p>password= 123</p>
    </div>
    <div>
        <h4>name= talha</h4>
        <p>password= 123</p>
    </div>
    <div>
        <h4>name= asim</h4>
        <p>password= 123</p>
    </div>
</div>
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
                                <form id="login-form" role="form" autocomplete="off" class="form" method="post"
                                    action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-profile_ color-blue"></i></span>
                                            <input name="profile_name" type="text" class="form-control"
                                                placeholder="Enter profile_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-lock color-blue"></i></span>
                                            <input name="password" type="password" class="form-control"
                                                placeholder="Enter Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit"> -->
                                        <button type="submit"
                                            class="btn btn-lg btn-primary btn-block mt-5">Login</button>
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