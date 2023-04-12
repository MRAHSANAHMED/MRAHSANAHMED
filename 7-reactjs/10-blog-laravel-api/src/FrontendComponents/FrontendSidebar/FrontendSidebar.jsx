import React from "react";

function FrontendSidebar() {
  return (
    <div class="col-md-4">
      <div class="well">
        <h4>Blog Search</h4>
        <div class="input-group">
          <input type="text" class="form-control" />
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
      </div>

      <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
          <div class="col-lg-6">
            <ul class="list-unstyled">
              <li>
                <a href="#">Category Name</a>
              </li>
              <li>
                <a href="#">Category Name</a>
              </li>
              <li>
                <a href="#">Category Name</a>
              </li>
              <li>
                <a href="#">Category Name</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-6">
            <ul class="list-unstyled">
              <li>
                <a href="#">Category Name</a>
              </li>
              <li>
                <a href="#">Category Name</a>
              </li>
              <li>
                <a href="#">Category Name</a>
              </li>
              <li>
                <a href="#">Category Name</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  );
}

export default FrontendSidebar;
