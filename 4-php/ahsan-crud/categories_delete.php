<?php
include "./database/db.php";

$category_id = $_GET['category_id'];

$delete_category_query = "DELETE FROM categories WHERE id = '{$category_id}'";


$result = custom_query($delete_category_query);

header("location: http://localhost/php/ahsan-crud/categories_view.php");
?>