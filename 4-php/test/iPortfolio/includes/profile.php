<?php //include "includes/gaurd.php"; ?>
  <main>

            <section class="hero d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-7 col-12">
                            <div class="hero-text text-uppercase">
                                <div class="hero-title-wrap d-flex align-items-center mb-4">
                              
                                    <h1 class="hero-title mt-5 mb-0"><?php echo $_SESSION['profile_name']; ?></h1>

                                </div>
                                

                                <h2 class="mb-4"><?php echo $_SESSION['profile_category']; ?></h2>
                                <p class="mb-4">
                                    <a class="custom-btn btn custom-link" href="#section_2"><?php echo $_SESSION['skill_title'].' , '.$_SESSION['skill2_title']; ?></a></p>
                            </div>
                        </div>

                        <div class="col-lg-5 col-12 position-relative">
                            <!-- <div class="col-lg-5 col-12 position-relative">
                        </div> -->
                            <div class="">
                                <?php if ($_SESSION['profile_image']): ?>

                                <img src="/test/iPortfolio<?php echo $_SESSION['profile_image'];?>" width="400px"  class="hero-image img-fluid rounded" alt="<?php $_SESSION['profile_id'];?>" >
                             <?php else: ?>
                                <h3><?php echo $_SESSION['profile_id'];?></h3>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#535da1" fill-opacity="1" d="M0,160L24,160C48,160,96,160,144,138.7C192,117,240,75,288,64C336,53,384,75,432,106.7C480,139,528,181,576,208C624,235,672,245,720,240C768,235,816,213,864,186.7C912,160,960,128,1008,133.3C1056,139,1104,181,1152,202.7C1200,224,1248,224,1296,197.3C1344,171,1392,117,1416,90.7L1440,64L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path></svg>
            </section>
              <section class="about section-padding" id="section_2">
                <div class="container">
                    <div class="row d-flex justify-content-around">

                        <div class="col-lg-6 col-12">
                            <img src="/test/iPortfolio<?php echo $_SESSION['profile_image'];?>" class="about-image img-fluid" width="300px" alt="<?php echo $_SESSION['profile_id'];?>">
                        </div>

                        <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                            <div class="about-thumb">

                                <div class="section-title-wrap d-flex justify-content-end align-items-center mb-4">
                                    <h2 class="text-white me-4 mb-0 text-capitalize"><?php echo $_SESSION['profile_name'];?> Story</h2>

                                    <img src="/test/iPortfolio<?php echo $_SESSION['profile_image'];?>" class="avatar-image img-fluid" alt="">
                                </div>

                                <h3 class="pt-2 mb-3">a little bit about <?php echo $_SESSION['profile_name'];?></h3>

                                <p><?php echo $_SESSION['profile_content'];?><BR><?php echo $_SESSION['profile_category'];?></p>

                                <p>contact</a><br><?php echo $_SESSION['profile_email'];?><br><?php echo $_SESSION['profile_contact'];?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
 