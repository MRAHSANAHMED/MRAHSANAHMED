<?php 
$customer_query = "SELECT * FROM customer";
$result=run_query($customer_query);
//  check($result);
?>

<div class="col-lg-6 col-12 mt-5 mt-lg-0">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="custom-form contact-form" role="form">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="form-floating">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">

                        <label for="floatingInput">Name</label>
                    </div>
                </div>

                <!-- <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-floating">
                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control"
                            placeholder="Email address" required="">

                        <label for="floatingInput">Email address</label>
                    </div>
                </div> -->

                

                <div class="col-lg-12 col-12">
                    <div class="form-floating">
                        <textarea class="form-control" id="message" name="message"
                            placeholder="Tell me about the project"></textarea>

                        <label for="floatingTextarea">Tell me about the project</label>
                    </div>
                </div>
                <?php if (isUserLike()): ?>
                <div class="col-12 d-flex justify-content-between">
                   
                    

                    <div class="row">
                        <p class="pull-right">
                            <a class="like" href="" data-customer-id="<?php //echo $_GET['customer_id']; ?>"
                                data-profile-id="<?php //echo $_SESSION['profile_id']; ?>">
                                <span class="glyphicon bi-hand-thumbs-up-fill" data-toggle="tooltip"
                                    data-placement="top" title="Want to like it?"></span>
                                like
                            </a>
                        </p>
                    </div>
                    <?php //else: ?>
                    <div class="row">
                        <p class="pull-right">
                            <a class="unlike" href="" data-customer-id="<?php //echo $_GET['customer_id']; ?>"
                                data-profile-id="<?php //echo $_SESSION['profile_id']; ?>"><span
                                    class="glyphicon bi-hand-thumbs-down-fill" data-toggle="tooltip"
                                    data-placement="top" title="Want to like it?"></span>
                                Unlike
                            </a>
                        </p>
                    </div>

                    <?php endif; ?>
                </div>

                <div class="col-lg-3 col-12 ms-auto">
                    <button type="submit" class="form-control">Send</button>
                </div>

            </div>
        </form>
    </div>

    </div>
    </div>
    </div>
    </section>

    </main>