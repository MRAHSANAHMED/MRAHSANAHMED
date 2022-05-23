<?php
include "./database/db.php";
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
	<h3 class="text-center">Category Listing</h3>
	<a href="categories_create.php" class="btn btn-primary">Create Category</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
<?php
$select_categories_query = "SELECT * FROM categories";
$result = custom_query($select_categories_query);
?>
<?php while ($row = mysqli_fetch_assoc($result)) {
    ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><a class="btn btn-primary" href="categories_update.php?category_id=<?php echo $row['id']; ?>">Edit</a></td>
        <td><a onclick="return confirm('REALLY?')" class="btn btn-danger" href="categories_delete.php?category_id=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>
<?php }?>

        </tbody>
    </table>
</div>
</body>
</html>