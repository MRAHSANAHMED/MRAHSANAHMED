 <section class="featured section-padding">
                <div class="container">
                    <div class="row">
<?php 

 
                            // $service_id = ($_GET['service_id']);

                            $profile_query="SELECT * FROM profiles left join skills on profiles.profile_skill = skills.skill_id left join skills2 on profiles.profile_skill2 = skills2.skill2_id limit 1";
                            $result_profile_query=run_query($profile_query);
                            
                            if($result_profile_query->num_rows >0){
                                while($row = mysqli_fetch_array($result_profile_query)){




                     ?>
                        <div class="col-lg-6 col-12">
                            <div class="profile-thumb">
                                <div class="profile-title">
                                    <h4 class="mb-0">Information</h4>
                                </div>

                                <div class="profile-body">
                                    <p>
                                        <span class="profile-small-title">Name</span> 
                                        <span><?php echo $row['profile_name']; ?></span>
                                    </p>

                                    <p>
                                        <span class="profile-small-title">Skills</span> 
                                        <span><?php echo $row['skill_title'].' , '.$row['skill2_title']; ?></span>
                                    </p>

                                    <p>
                                        <span class="profile-small-title">Phone</span> 
                                         <span><a href="tel: 305-240-9671"><?php echo $row['profile_contact'];?></a></span>
                                    </p>

                                    <p>
                                        <span class="profile-small-title">Email</span> 
                                        <span><a href="mailto:hello@josh.design"><?php echo $row['profile_email'];?></a></span>
                                    </p>
                                </div>
                            </div>
                        </div>
<?php }}?>
                        <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                            <div class="about-thumb">
                                <div class="row">
                                    <div class="col-lg-6 col-6 featured-border-bottom py-2">
                                        <strong class="featured-numbers">20+</strong>

                                        <p class="featured-text">Years of Experiences</p>
                                    </div>

                                    <div class="col-lg-6 col-6 featured-border-start featured-border-bottom ps-5 py-2">
                                        <strong class="featured-numbers">245</strong>

                                        <p class="featured-text">Happy Customers</p>
                                    </div>

                                    <div class="col-lg-6 col-6 pt-4">
                                        <strong class="featured-numbers">640</strong>

                                        <p class="featured-text">Project Finished</p>
                                    </div>

                                    <div class="col-lg-6 col-6 featured-border-start ps-5 pt-4">
                                        <strong class="featured-numbers">72+</strong>

                                        <p class="featured-text">Digital Awards</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>