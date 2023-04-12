import React from "react";
import FrontendHeader from "../../FrontendComponents/FrontendHeader/FrontendHeader";
import FrontendFooter from "../../FrontendComponents/FrontendFooter/FrontendFooter";
import FrontendSidebar from "../../FrontendComponents/FrontendSidebar/FrontendSidebar";
import "../../assets/frontend/css/bootstrap.min.css";
import "../../assets/frontend/css/blog-home.css";

function Home() {
  return (
    <div>
      <FrontendHeader />
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h1 class="page-header">
              Page Heading
              <small>Secondary Text</small>
            </h1>

            <h2>
              <a href="/">Blog Post Title</a>
            </h2>
            <p class="lead">
              by <a href="index.php">Start Bootstrap</a>
            </p>
            <p>
              <span class="glyphicon glyphicon-time"></span> Posted on August
              28, 2013 at 10:00 PM
            </p>
            <hr />
            <img
              class="img-responsive"
              src="http://placehold.it/900x300"
              alt=""
            />
            <hr />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore,
              veritatis, tempora, necessitatibus inventore nisi quam quia
              repellat ut tempore laborum possimus eum dicta id animi corrupti
              debitis ipsum officiis rerum.
            </p>
            <a class="btn btn-primary" href="/">
              Read More <span class="glyphicon glyphicon-chevron-right"></span>
            </a>

            <hr />

            <h2>
              <a href="/">Blog Post Title</a>
            </h2>
            <p class="lead">
              by <a href="index.php">Start Bootstrap</a>
            </p>
            <p>
              <span class="glyphicon glyphicon-time"></span> Posted on August
              28, 2013 at 10:45 PM
            </p>
            <hr />
            <img
              class="img-responsive"
              src="http://placehold.it/900x300"
              alt=""
            />
            <hr />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a
              possimus nesciunt quod accusamus saepe tempora ipsam distinctio
              minima dolorum perferendis labore impedit voluptates!
            </p>
            <a class="btn btn-primary" href="/">
              Read More <span class="glyphicon glyphicon-chevron-right"></span>
            </a>

            <hr />

            <h2>
              <a href="/">Blog Post Title</a>
            </h2>
            <p class="lead">
              by <a href="index.php">Start Bootstrap</a>
            </p>
            <p>
              <span class="glyphicon glyphicon-time"></span> Posted on August
              28, 2013 at 10:45 PM
            </p>
            <hr />
            <img
              class="img-responsive"
              src="http://placehold.it/900x300"
              alt=""
            />
            <hr />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam
              accusantium laudantium adipisci architecto itaque dicta aperiam
              maiores provident id incidunt autem. Magni, ratione.
            </p>
            <a class="btn btn-primary" href="/">
              Read More <span class="glyphicon glyphicon-chevron-right"></span>
            </a>

            <hr />

            <ul class="pager">
              <li class="previous">
                <a href="/">&larr; Older</a>
              </li>
              <li class="next">
                <a href="/">Newer &rarr;</a>
              </li>
            </ul>
          </div>

          <FrontendSidebar />
        </div>

        <hr />

        <FrontendFooter />
      </div>

      <script src="js/jquery.js"></script>

      <script src="js/bootstrap.min.js"></script>
    </div>
  );
}

export default Home;
