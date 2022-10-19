   <section class="services section-padding" id="section_3">
                <div class="container">
                    <div class="row">
                     
                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="section-title-wrap d-flex justify-content-center align-items-center mb-5">
                                <img src="includes/images/handshake-man-woman-after-signing-business-contract-closeup.jpg" class="avatar-image img-fluid" alt="">

                                <h2 class="text-white ms-4 mb-0">Services</h2>
                            </div>
                            <div class="row pt-lg-5">

                <?php 

 
                            // $service_id = ($_GET['service_id']);

                            $service_query="SELECT * FROM services left join skills on services.service_category_id = skills.skill_id left join skills2 on services.service2_category_id = skills2.skill2_id ";
                            $result_service_query=run_query($service_query);
                            
                            if($result_service_query->num_rows >0){
                                while($row = mysqli_fetch_array($result_service_query)){




                     ?>
                                <div class="col-lg-6 col-12">
                                    <div class="services-thumb">
                                        <div class="d-flex flex-wrap align-items-center border-bottom mb-4 pb-3">
                                            <h3 class="mb-0"><?php echo $row['service_title']; ?></h3>

                                            <div class="services-price-wrap ms-auto">
                                                <p class="services-price-text mb-0"></p>
                                                <div class="services-price-overlay"><?php echo $row['service_id']; ?></div>
                                            </div>
                                        </div>

                                        <p><?php echo $row['service_content']; ?></p>

                                        <a href="#" class="custom-btn custom-border-btn btn mt-3"><?php echo $row['skill_title']; ?> , <?php echo $row['skill2_title']; ?></a>

                                        <div class="services-icon-wrap d-flex justify-content-center align-items-center">
                                           <?php if ($row['service_image']): ?>

                                <img src="/test/iPortfolio/<?php echo $row['service_image'];?>" class="w-100 hero-image img-fluid rounded-circle" alt="<?php $row['service_id'];?>" >
                             <?php else: ?>
                                <h3><?php echo $row['service_id'];?></h3>
                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php }}?>
                             
                        </div>
                    </div>
                </div>
            </section>