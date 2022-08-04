<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>



<?php 
$source = "index.php";
if(isset($_GET['source'])) {
    switch ($_GET['source']){
        case 'add':
        $source = "create.php";
        break;

        case 'edit':
        $source = "edit.php";
        break;
    }

    // if ($_GET['source'] == 'add') {
    //     $source = "create.php";

    // }else if ($_GET['source'] == 'edit') {
    //     $source = "edit.php";
    // }
}

include "post/{$source}";
?>

<?php include "includes/footer.php"; ?>