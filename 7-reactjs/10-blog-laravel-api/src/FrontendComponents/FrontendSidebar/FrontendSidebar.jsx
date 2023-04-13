/* eslint-disable jsx-a11y/anchor-is-valid */
import React from "react";

function FrontendSidebar(props) {
  const { categoriesData = [] } = props;

  const tempCategoryData = [...categoriesData];

  //it will remove from 10 to array length
  tempCategoryData.splice(10, tempCategoryData.length);

  return (
    <div className="col-md-4">
      <div className="well">
        <h4>Blog Search</h4>
        <div className="input-group">
          <input type="text" className="form-control" />
          <span className="input-group-btn">
            <button className="btn btn-default" type="button">
              <span className="glyphicon glyphicon-search"></span>
            </button>
          </span>
        </div>
      </div>
      <div className="well">
        <h4>Blog Categories</h4>
        <div className="row">
          <div className="col-lg-12">
            <ul className="list-unstyled">
              {tempCategoryData.map((singleCategory, index) => {
                return (
                  <li>
                    <a href="#">
                      {" "}
                      {index + 1} : {singleCategory?.cat_title}
                    </a>
                  </li>
                );
              })}
            </ul>
          </div>
        </div>
      </div>
    </div>
  );
}
export default FrontendSidebar;
