

<div class="col-lg-6 col-12 mt-5 mt-lg-0">
<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $customer_name = $_POST['customer_name'];
    $comment_rate = $_POST['comment_rate'];
    $comment_content = $_POST['comment_content'];
    $session_profile_id = $_SESSION['profile_id'];
    $comments_query = "INSERT INTO comments (customer_name,comment_status,comment_content,profile_id,comment_rate) 
                    VALUES ('$customer_name','PENDING','$comment_content', '$session_profile_id','$comment_rate')";
    $result=run_query($comments_query);
}

?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="custom-form contact-form" role="form">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">

                <div class="hero-title-wrap d-flex align-items-center mb-4 justify-content-center">
                              
                                    <h1 class="hero-title mt-5 mb-0">RATE ME</h1>

                                </div>
                    <div class="form-floating">
                        <input type="text" name="customer_name" id="name" class="form-control" placeholder="Customer Name" required="required">

                        <label for="floatingInput">Customer Name</label>
                    </div>
                </div>

                <div class="col-lg-12 col-12">
                    <div class="form-floating">
                        <textarea class="form-control" id="message" name="comment_content"
                            placeholder="Tell me about my work"></textarea>

                        <label for="floatingTextarea">Tell me about my work</label>
                    </div>
                </div>
                    <div class="form-group">
                            <label for="">DO YOU LIKE</label>
                                <select name="comment_rate" id="input" class="form-control" >
                                    <option value="">LIKE / UNLIKE</option>
                                    <option value="LIKE">LIKE</option>
                                    <option value="UNLIKE">UNLIKE</option>
                                    <option value="AVERAGE">AVERAGE</option>

                                </select>
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