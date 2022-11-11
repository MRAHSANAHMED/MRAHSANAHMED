@extends('includes.app')

@section('content')

@include('layout.navigation')



    <!-- Start Home Page Slider -->
   @include('layout.banner')
    <!-- End Home Page Slider -->



  // @include('layout.services')
        <!-- End Feature Section -->


    <!-- Start Call to Action Section -->
    {{--  <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Libero tempore soluta nobis est eligendi</br> optio cumque nihil impedit minus id quod maxime </br>placeat facere possimus, omnis voluptas assumenda est</h1>
                    <button type="submit" class="btn btn-primary">Buy This Template</button>
                </div>
            </div>
        </div>
    </section>  --}}
    <!-- End Call to Action Section -->



        <!-- Start Portfolio Section -->
    @include('layout.my-portfolio')
        <!-- End Portfolio Section -->




    <!-- Start About Us Section -->
  @include('layout.about')
    <!-- End About Us Section -->


    <!-- Start About Us Section 2 -->
    <div class="about-us-section-2">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="skill-shortcode">

                        <!-- Progress Bar -->
                        <div class="skill">
                            <p>Web Design</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"  data-percentage="60">
                                    <span class="progress-bar-span" >60%</span>
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="skill">
                            <p>HTML & CSS</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"  data-percentage="95">
                                    <span class="progress-bar-span" >95%</span>
                                    <span class="sr-only">95% Complete</span>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="skill">
                            <p>Wordpress</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"  data-percentage="80">
                                    <span class="progress-bar-span" >80%</span>
                                    <span class="sr-only">80% Complete</span>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="skill">
                            <p>Joomla</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"  data-percentage="100">
                                    <span class="progress-bar-span" >100%</span>
                                    <span class="sr-only">100% Complete</span>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="skill">
                            <p>Extension</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"  data-percentage="70">
                                    <span class="progress-bar-span" >70%</span>
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div id="carousel-example-generic" class="carousel slide about-slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="asset/asset-client/images/about-01.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="asset/asset-client/images/about-02.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="asset/asset-client/images/about-03.jpg" alt="">
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Start About Us Section 2 -->





    <!-- Start Feature Section -->
     @include('layout.our-services')
        <!-- End Feature Section -->



    <!-- Start Fun Facts Section -->
   @include('layout.review')
    <!-- End Fun Facts Section -->



    <!-- Start Team Member Section -->
 @include('layout.team')
    <!-- End Team Member Section -->



    <!-- Start Pricing Table Section -->
    {{--  <div id="pricing" class="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h3>Our Pricing Plan</h3>
                            <p class="white-text">Duis aute irure dolor in reprehenderit in voluptate</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="pricing">

                        <div class="col-md-12">
                            <div class="pricing-table">
                                <div class="plan-name">
								    <h3>Free</h3>
                                </div>
                                <div class="plan-price">
                                    <div class="price-value">$49<span>.00</span></div>
                                    <div class="interval">per month</div>
                                </div>
                                <div class="plan-list">
                                    <ul>
                                        <li>40 GB Storage</li>
                                        <li>40GB Transfer</li>
                                        <li>10 Domains</li>
                                        <li>20 Projects</li>
                                        <li>Free installation</li>
                                    </ul>
                                </div>
                                <div class="plan-signup">
                                    <a href="#" class="btn-system btn-small">Sign Up Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="pricing-table">
                                <div class="plan-name">
								    <h3>Standard</h3>
                                </div>
                                <div class="plan-price">
                                    <div class="price-value">$49<span>.00</span></div>
                                    <div class="interval">per month</div>
                                </div>
                                <div class="plan-list">
                                    <ul>
                                        <li>40 GB Storage</li>
                                        <li>40GB Transfer</li>
                                        <li>10 Domains</li>
                                        <li>20 Projects</li>
                                        <li>Free installation</li>
                                    </ul>
                                </div>
                                <div class="plan-signup">
                                    <a href="#" class="btn-system btn-small">Sign Up Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pricing-table">
                                <div class="plan-name">
								    <h3>Premium</h3>
                                </div>
                                <div class="plan-price">
                                    <div class="price-value">$49<span>.00</span></div>
                                    <div class="interval">per month</div>
                                </div>
                                <div class="plan-list">
                                    <ul>
                                        <li>40 GB Storage</li>
                                        <li>40GB Transfer</li>
                                        <li>10 Domains</li>
                                        <li>20 Projects</li>
                                        <li>Free installation</li>
                                    </ul>
                                </div>
                                <div class="plan-signup">
                                    <a href="#" class="btn-system btn-small">Sign Up Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="pricing-table">
                                <div class="plan-name">
								    <h3>Professional</h3>
                                </div>
                                <div class="plan-price">
                                    <div class="price-value">$49<span>.00</span></div>
                                    <div class="interval">per month</div>
                                </div>
                                <div class="plan-list">
                                    <ul>
                                        <li>40 GB Storage</li>
                                        <li>40GB Transfer</li>
                                        <li>10 Domains</li>
                                        <li>20 Projects</li>
                                        <li>Free installation</li>
                                    </ul>
                                </div>
                                <div class="plan-signup">
                                    <a href="#" class="btn-system btn-small">Sign Up Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="pricing-table">
                                <div class="plan-name">
								    <h3>Premium</h3>
                                </div>
                                <div class="plan-price">
                                    <div class="price-value">$49<span>.00</span></div>
                                    <div class="interval">per month</div>
                                </div>
                                <div class="plan-list">
                                    <ul>
                                        <li>40 GB Storage</li>
                                        <li>40GB Transfer</li>
                                        <li>10 Domains</li>
                                        <li>20 Projects</li>
                                        <li>Free installation</li>
                                    </ul>
                                </div>
                                <div class="plan-signup">
                                    <a href="#" class="btn-system btn-small">Sign Up Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="pricing-table">
                                <div class="plan-name">
								    <h3>Professional</h3>
                                </div>
                                <div class="plan-price">
                                    <div class="price-value">$49<span>.00</span></div>
                                    <div class="interval">per month</div>
                                </div>
                                <div class="plan-list">
                                    <ul>
                                        <li>40 GB Storage</li>
                                        <li>40GB Transfer</li>
                                        <li>10 Domains</li>
                                        <li>20 Projects</li>
                                        <li>Free installation</li>
                                    </ul>
                                </div>
                                <div class="plan-signup">
                                    <a href="#" class="btn-system btn-small">Sign Up Now</a>
                                </div>
                            </div>
                        </div>

                    </div>


            </div>
        </div>
    </div>  --}}
    <!-- End Pricing Table Section -->



    <!-- Start Latest News Section -->
    {{--  <section id="latest-news" class="latest-news-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Latest News</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="latest-news">
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="asset/asset-client/images/about-01.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>31</strong> <br>Dec , 2014</span>

                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="asset/asset-client/images/about-02.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>17</strong> <br>Feb , 2014</span>

                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="asset/asset-client/images/about-03.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>

                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="asset/asset-client/images/about-01.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>

                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="asset/asset-client/images/about-02.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>

                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="latest-post">
                            <img src="asset/asset-client/images/about-03.jpg" class="img-responsive" alt="">
                            <h4><a href="#">Standard Post with Image</a></h4>
                            <div class="post-details">
                                <span class="date"><strong>08</strong> <br>Aug , 2014</span>

                            </div>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  --}}
    <!-- End Latest News Section -->






    <!-- Start Testimonial Section -->
    @include('layout.testimonal')
    <!-- End Testimonial Section -->



    <!-- Clients Aside -->
    <section id="partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Our Honorable Partner</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="clients">

                    <div class="col-md-12">
                        <img src="asset/asset-client/images/logos/themeforest.jpg" class="img-responsive" alt="...">
                    </div>

                    <div class="col-md-12">
                        <img src="asset/asset-client/images/logos/creative-market.jpg" class="img-responsive" alt="...">
                    </div>

                    <div class="col-md-12">
                        <img src="asset/asset-client/images/logos/designmodo.jpg" class="img-responsive" alt="...">
                    </div>

                    <div class="col-md-12">
                        <img src="asset/asset-client/images/logos/creative-market.jpg" class="img-responsive" alt="...">
                    </div>

                    <div class="col-md-12">
                        <img src="asset/asset-client/images/logos/microlancer.jpg" class="img-responsive" alt="...">
                    </div>

                    <div class="col-md-12">
                        <img src="asset/asset-client/images/logos/themeforest.jpg" class="img-responsive" alt="...">
                    </div>

                    <div class="col-md-12">
                        <img src="asset/asset-client/images/logos/microlancer.jpg" class="img-responsive" alt="...">
                    </div>

                    <div class="col-md-12">
                        <img src="asset/asset-client/images/logos/designmodo.jpg" class="img-responsive" alt="...">
                    </div>

                    <div class="col-md-12">
                        <img src="asset/asset-client/images/logos/creative-market.jpg" class="img-responsive" alt="...">
                    </div>

                    <div class="col-md-12">
                        <img src="asset/asset-client/images/logos/designmodo.jpg" class="img-responsive" alt="...">
                    </div>

                </div>
            </div>
        </div>
    </section>





    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h3>Review Us</h3>
                        <p class="white-text">Duis aute irure dolor in reprehenderit in voluptate</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-contact-info">
                        <h4>Contact info</h4>
                        <ul>
                            <li><strong>E-mail :</strong> your-email@mail.com</li>
                            <li><strong>Phone :</strong> +8801-6778776</li>
                            <li><strong>Mobile :</strong> +8801-45565378</li>
                            <li><strong>Web :</strong> yourdomain.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="footer-contact-info">
                        <h4>Working Hours</h4>
                        <ul>
                            <li><strong>Mon-Wed :</strong> 9 am to 5 pm</li>
                            <li><strong>Thurs-Fri :</strong> 12 pm to 10 pm</li>
                            <li><strong>Sat :</strong> 9 am to 3 pm</li>
                            <li><strong>Sunday :</strong> Closed</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.footer')


    </section>
