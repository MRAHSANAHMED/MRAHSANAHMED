

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">HOME</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php 
                $cat_query = "SELECT * FROM categories limit 10";
                $result = connection_query($cat_query);

                ?>

                <?php if ($result->num_rows > 0) : ?>
                    <?php while($row = mysqli_fetch_assoc($result)){
                        ?>
                    <li>
                        <a href="<?php echo $row['links']; ?>"><?php echo $row['cat_title'];?></a>
                    </li> 

                     <?php } ?>
                     <?php endif ?>



                    <?php if (isUserLoggedIn()): ?>
                        <li>
                            <a href="/my-work/html-templates/admin/">Admin</a>
                        </li>
                <?php else: ?>
                        <li>
                            <a href="/my-work/html-templates/login.php">Login</a>
                        </li>
                <?php endif ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>