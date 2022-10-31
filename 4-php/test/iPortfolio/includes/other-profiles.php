 <section class="clients section-padding">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12 ">
                            <h3 class="text-center mb-5">profiles suggestions</h3>
                        </div>
<?php 
$profile_query = "SELECT * FROM PROFILES WHERE  profile_id != '".$_SESSION['profile_id']."'";
$result=run_query($profile_query);
if($result->num_rows>0){
    while($row=mysqli_fetch_array($result)){


?>
                        <div class="col-lg-4  clients-item-height">
                            <H5 class="text-capitalize text-warning"><?php echo $row['profile_name']?></H5>
                             <div class="col-lg-4 d-flex justify-content-between ">
                                <img src="/test/iPortfolio<?php echo $row['profile_image'];?>" width="120px" class=" img-fluid" alt="<?php echo $row['profile_id'];?>">
                            </div>
                            

                        </div>
<?php }}?>
                    

                    </div>
                </div>
            </section>