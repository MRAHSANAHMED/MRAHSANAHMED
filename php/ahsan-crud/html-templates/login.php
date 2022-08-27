<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    $get_user_row = "SELECT * FROM users where users.username = '$input_username'";
    $result = connection_query($get_user_row);
    $row = mysqli_fetch_array($result);

    $DB_password = $row['user_password'];
    $DB_username = $row['username'];
    $DB_user_id = $row['user_id'];
    $DB_user_email = $row['user_email'];
  
    if(password_verify($input_password, $DB_password)){
        $_SESSION['user_id'] = $DB_user_id;
        $_SESSION['username'] = $DB_username;
        $_SESSION['user_email'] = $DB_user_email;

        return redirect('/my-work/html-templates/index.php');
    } else {
        return redirect('/my-work/html-templates/login.php');
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
                            <h3><i class="fa fa-user fa-4x"></i></h3>
                            <h2 class="text-center">Login</h2>
                            <div class="panel-body">
                                <form id="login-form" role="form" autocomplete="off" class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                                            <input name="username" type="text" class="form-control" placeholder="Enter Username">
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
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
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