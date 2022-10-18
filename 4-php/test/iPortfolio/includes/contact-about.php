 <section class="contact section-padding" id="section_5">
     <div class="container">
         <div class="row">

             <div class="col-lg-6 col-md-8 col-12">
                 <div class="section-title-wrap d-flex justify-content-center align-items-center mb-5">
                     <img src="includes/images/aerial-view-man-using-computer-laptop-wooden-table.jpg"
                         class="avatar-image img-fluid" alt="">

                     <h2 class="text-white ms-4 mb-0">Say Hi</h2>
                 </div>
             </div>

             <div class="clearfix"></div>
             <?php
                            $profile_query = "SELECT * FROM (profiles,services,skills,skills2) limit 3";
                            
                            $result=run_query($profile_query); 
                            ?>
             <div class="col-lg-3 col-md-6 col-12 pe-lg-0">
                 <div class="contact-info contact-info-border-start d-flex flex-column">
                     <strong class="site-footer-title d-block mb-3">Services</strong>
                     <?php if($result->num_rows >0){
    while($row=mysqli_fetch_assoc($result)){?>
                     <ul class="footer-menu">
                         <li class="footer-menu-item"><a href="#"
                                 class="footer-menu-link"><?php echo $row['service_title'];?></a></li>


                     </ul>
                     <?php }} ?>
                     <strong class="site-footer-title d-block mt-4 mb-3">Stay connected</strong>

                     <ul class="social-icon">
                         <li class="social-icon-item"><a href="https://www.facebook.com/profile.php?id=100069812320113" target="_blank"
                                 class="social-icon-link bi-twitter"></a></li>

                         <li class="social-icon-item"><a href="https://www.facebook.com/profile.php?id=100069812320113" target="_blank" class="social-icon-link bi-instagram"></a></li>

                         <li class="social-icon-item"><a href="https://www.facebook.com/profile.php?id=100069812320113" target="_blank" class="social-icon-link bi-pinterest"></a></li>

                         <li class="social-icon-item"><a href="https://www.facebook.com/profile.php?id=100069812320113" target="_blank"
                                 class="social-icon-link bi-youtube"></a></li>
                     </ul>

                     <strong class="site-footer-title d-block mt-4 mb-3">Start a project</strong>

                     <p class="mb-0">I’m available for freelance projects</p>
                 </div>
             </div>
             <?php
                            $profile_query = "SELECT * FROM (profiles,services,skills,skills2) limit 1";
                            
                            $result=run_query($profile_query); 
                            ?>
             <div class="col-lg-3 col-md-6 col-12 ps-lg-0">
                 <div class="contact-info d-flex flex-column">
                     <strong class="site-footer-title d-block mb-3">About</strong>
                     <?php if($result->num_rows >0){
    while($row=mysqli_fetch_assoc($result)){?>
                     <p class="mb-2">
                         <?php echo ucwords($row['profile_name']);?> is a professional <?php echo $row['profile_category'];?> developer. Feel free to get in touch with me.
                     </p>

                     <strong class="site-footer-title d-block mt-4 mb-3">Email</strong>

                     <p>
                         <a href="mailto:hello@josh.design">
                         <?php echo $row['profile_email'];?>
                         </a>
                     </p>

                     <strong class="site-footer-title d-block mt-4 mb-3">Call</strong>

                     <p class="mb-0">
                         <a href="tel: 120-240-9600">
                         <?php echo $row['profile_contact'];?>
                         </a>
                     </p>

                 </div>
             </div>
             <?php }} ?>