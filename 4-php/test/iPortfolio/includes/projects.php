 <section class="projects section-padding" id="section_4">
                <div class="container">
                    <div class="row">
<?php $skill_query = "SELECT * FROM skills left join skills2 on skills.skill_title = skills2.skill2_title limit 6";
$result = run_query($skill_query);
?>
                        <div class="col-lg-8 col-md-8 col-12 ms-auto">
                            <div class="section-title-wrap d-flex justify-content-center align-items-center mb-4">
                                <img src="includes/images/white-desk-work-study-aesthetics.jpg" class="avatar-image img-fluid" alt="">

                                <h2 class="text-white ms-4 mb-0">SKILLS</h2>
                            </div>
                        </div>

                        <div class="clearfix"></div>
<?php if($result->num_rows >0){
    while($row=mysqli_fetch_assoc($result)){?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="projects-thumb">
                                <div class="projects-info">
                                    <small class="projects-tag"><?php echo $row['skill2_title']?></small>

                                    <h3 class="projects-title"><?php echo $row['skill_title']?></h3>
                                </div>

                                <a href="images/projects/nikhil-KO4io-eCAXA-unsplash.jpg" class="popup-image">
                                    <!-- <img src="includes/images/projects/nikhil-KO4io-eCAXA-unsplash.jpg" class="projects-image img-fluid" alt=""> -->
                                </a>
                            </div>
                        </div>
<?php }}?>
                       <!--  <div class="col-lg-4 col-md-6 col-12">
                            <div class="projects-thumb">
                                <div class="projects-info">
                                    <small class="projects-tag">Photography</small>

                                    <h3 class="projects-title">The Watch</h3>
                                </div>

                                <a href="images/projects/the-5th-IQYR7N67dhM-unsplash.jpg" class="popup-image">
                                    <img src="includes/images/projects/the-5th-IQYR7N67dhM-unsplash.jpg" class="projects-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="projects-thumb">
                                <div class="projects-info">
                                    <small class="projects-tag">Website</small>

                                    <h3 class="projects-title">Polo</h3>
                                </div>

                                <a href="images/projects/true-agency-9Bjog5FZ-oc-unsplash.jpg" class="popup-image">
                                    <img src="includes/images/projects/true-agency-9Bjog5FZ-oc-unsplash.jpg" class="projects-image img-fluid" alt="">
                                </a>
                            </div>
                        </div> -->

                    </div>
                </div>
            </section>