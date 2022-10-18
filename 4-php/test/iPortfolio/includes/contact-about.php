 <section class="contact section-padding" id="section_5">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-6 col-md-8 col-12">
                                <div class="section-title-wrap d-flex justify-content-center align-items-center mb-5">
                                    <img src="includes/images/aerial-view-man-using-computer-laptop-wooden-table.jpg" class="avatar-image img-fluid" alt="">

                                    <h2 class="text-white ms-4 mb-0">Say Hi</h2>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <?php
                            $profile_query = "SELECT * FROM (profiles,services,skills,skills2)";
                            // "SELECT profiles.profile_id
                            //         profiles.profile_name
                            //         profiles.profile_email
                            //         profiles.profile_category
                            //         profiles.profile_contact
                            //         profiles.profile_content
                            //         profiles.profile_image
                            //         profiles.profile_skill
                            //         profiles.profile_skill2
                            //         services.service_id
                            //         services.service_title
                            //         services.service_category_id
                            //         services.service2_category_id
                            //         services.service_content
                            //         services.service_image
                            //         services.service_price
                            //         skills.skill_id
                            //         skills.skill_title
                            //         skills2.skill2_id
                            //         skills2.skill2_title
                            //  ";
                            $result=run_query($profile_query); 
                            ?>
                            <div class="col-lg-3 col-md-6 col-12 pe-lg-0">
                                <div class="contact-info contact-info-border-start d-flex flex-column">
                                    <strong class="site-footer-title d-block mb-3">Services</strong>
<?php if($result->num_rows >0){
    while($row=mysqli_fetch_assoc($result)){?>
                                    <ul class="footer-menu">
                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link"><?php echo $row['service_title'];?></a></li>

                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Branding</a></li>

                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">Ecommerce</a></li>

                                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">SEO</a></li>
                                    </ul>
<?php }} ?>
                                    <strong class="site-footer-title d-block mt-4 mb-3">Stay connected</strong>

                                    <ul class="social-icon">
                                        <li class="social-icon-item"><a href="https://twitter.com/minthu" class="social-icon-link bi-twitter"></a></li>

                                        <li class="social-icon-item"><a href="#" class="social-icon-link bi-instagram"></a></li>

                                        <li class="social-icon-item"><a href="#" class="social-icon-link bi-pinterest"></a></li>

                                        <li class="social-icon-item"><a href="https://www.youtube.com/templatemo" class="social-icon-link bi-youtube"></a></li>
                                    </ul>

                                    <strong class="site-footer-title d-block mt-4 mb-3">Start a project</strong>

                                    <p class="mb-0">I’m available for freelance projects</p>
                                </div>
                            </div>
 <div class="col-lg-3 col-md-6 col-12 ps-lg-0">
                                <div class="contact-info d-flex flex-column">
                                    <strong class="site-footer-title d-block mb-3">About</strong>

                                    <p class="mb-2">
                                        Joshua is a professional web developer. Feel free to get in touch with me.
                              </p>

                                    <strong class="site-footer-title d-block mt-4 mb-3">Email</strong>

                                    <p>
                                        <a href="mailto:hello@josh.design">
                                            hello@josh.design
                                        </a>
                                    </p>

                                    <strong class="site-footer-title d-block mt-4 mb-3">Call</strong>

                                    <p class="mb-0">
                                        <a href="tel: 120-240-9600">
                                            120-240-9600
                                        </a>
                                    </p>
                                </div>
                            </div>