
        <section class="preloader">
            <div class="spinner">
                <span class="spinner-rotate"></span>    
            </div>
        </section>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
           
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a href="includes/profile_status.php" class="navbar-brand mx-auto mx-lg-0"><?php echo ucwords($_SESSION['profile_name']);?></a>

                
                <div class="d-flex align-items-center d-lg-none">
                    <a class="custom-btn btn" href="#section_5">
                    </a>
                </div>
                

                <div class="collapse navbar-collapse" id="navbarNav">
                     <?php
                            // $service_id = ($_GET['service_id']);

                            $service_query="SELECT * FROM services limit 3";
                            $result_service_query=run_query($service_query);
                            
                            if($result_service_query->num_rows >0){
                                while($row = mysqli_fetch_array($result_service_query)){




                     ?>
                    <ul class="navbar-nav ms-lg-5">
                
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1"><?php echo $row['service_title'];?></a>
                        </li>

                    </ul>
                    <?php }}?>
                  
                    <div class="d-lg-flex align-items-center d-none ms-auto">
                        <i class="navbar-icon bi-telephone-plus me-3"></i>
                        <a class="custom-btn btn" href="#section_5">
                        <?php echo $_SESSION['profile_contact'];?>

                        </a>
                        <div  class="form-group" method="POST">
                      <a class="btn " style="color:red; font-size:14px;" type="submit" href="admin/index.php">Admin</a>

                      <a class="btn " style="color:red; font-size:14px;" type="submit" href="logout.php">Logout</a>
                    </div>
                    </div>
                    

                </div>

            </div>
        </nav>