<?php include "includes/header.php";?>
<?php include "includes/navigation.php";?>
<!-- ======= Header ======= -->



<!-- ======= Sidebar ======= -->
 

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <?php 
 
 
?>

    <?php
    if($_SERVER['REQUEST_METHOD'] == "GET" && !empty($_GET['search'])){
        $search_variable = strtolower($_GET['search']);
        $search_query = "select * from services left join skills on services.service_category_id = skills.skill_title
                                            left join skills2 on services.service_category_id = skills2.skill2_title 
                                              WHERE lower(services.service_title) like '%$search_variable%'";
        $result_search = run_query($search_query);
    
        if ($result_search->num_rows > 0){ 
            while($row = mysqli_fetch_assoc($result_search)){ ?>
    <div class="col-10 d-flex justify-content-between align-items-end">

        <tbody> 
        <tr> 
            <h2> TITLE :<span class="btn btn-lg btn-primary" style="color:;"> <?php echo $row['service_title'];?></span></h2>
        
            <h3> PRICE : <span class="btn btn-lg btn-warning" style="color:;"><?php echo $row['service_price'];?>  </span></h3>
            <h3> EXPERTISE :<span class="btn btn-lg btn-warning" style="color:;"> <?php echo $row['service_content'];?></span></h3>
            <td><?php 
                        if ($row['service_image']):?>
                           <img width="350px" src="/test/iPortfolio<?php echo $row['service_image'];?>" alt="<?php echo $row['service_id'];?>">

                        <?php else :?>

                            <h4>no image</h4>
                         <?php endif ?>
            </td>                                       
        </tr>
</tbody>

    </div>
    <hr style="border:solid 3px red">
<?php
            } 
        } else {
            echo 'No record found';
        }
    } else {
        echo 'PLEASE WRITE SOMETHING';
    }

         ?>




  
  
    <?php include "includes/footer.php";?>