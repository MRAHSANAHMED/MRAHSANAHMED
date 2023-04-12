import React from "react";
import { Link } from "react-router-dom";
import { unAuthenticatedRoutes } from "../../utilities/util.constant";

function FrontendHeader() {
  return (
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button
            type="button"
            class="navbar-toggle"
            data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1"
          >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <Link class="navbar-brand" to={unAuthenticatedRoutes.HOME}>
            Home
          </Link>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="#">About</a>
            </li>
            <li>
              <a href="#">Services</a>
            </li>
            <li>
              <a href="#">Contact</a>
            </li>
            <li>
              <Link to={unAuthenticatedRoutes.LOGIN}>Login</Link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  );
}

export default FrontendHeader;
