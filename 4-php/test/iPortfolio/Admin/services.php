<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>
<?php 
$source = "index.php";

if(isset($_GET['source'])){
	switch($_GET['source']){
		case 'add';
		$source = "create.php";
		break;
		
		case 'edit';
		$source = "edit.php";
		break;
	}
}

include"services/{$source}";
?>





<?php include "includes/footer.php";?>