<?php
include "./database/db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $category_name = $_POST['category_name'];
    $insert_categories_query = "INSERT INTO categories(name) VALUES ('$category_name')";

    $result = custom_query($insert_categories_query);

    header("location: http://localhost/php/ahsan-crud/categories_view.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Category Create Form</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">

        <a class="btn btn-primary" style="margin-top:20px;margin-bottom:20px;" 
        href="http://localhost/php/ahsan-crud">Category View</a>
	<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<legend>Category Create Form</legend>

		<div class="form-group">
			<label for="">Category Name</label>
			<input type="text" class="form-control" name="category_name" placeholder="Type Category Name">
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

</div>
</body>
</html>