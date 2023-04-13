/* eslint-disable jsx-a11y/anchor-is-valid */
import React from "react";
import { Link } from "react-router-dom";
import { unAuthenticatedRoutes } from "../../utilities/util.constant";

function FrontendHeader(props) {
  const { categoriesData } = props;
  const tempCategoryData = [...categoriesData];

  //it will remove from 10 to array length
  tempCategoryData.splice(5, tempCategoryData.length);
  return (
    <nav className="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div className="container">
        <div className="navbar-header">
          <button
            type="button"
            className="navbar-toggle"
            data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1"
          >
            <span className="sr-only">Toggle navigation</span>
            <span className="icon-bar"></span>
            <span className="icon-bar"></span>
            <span className="icon-bar"></span>
          </button>
          <Link className="navbar-brand" to={unAuthenticatedRoutes.HOME}>
            Home
          </Link>
        </div>

        <div
          className="collapse navbar-collapse"
          id="bs-example-navbar-collapse-1"
        >
          <ul className="nav navbar-nav">
            {tempCategoryData.map((singleCategory) => {
              return (
                <li>
                  <Link to={singleCategory.cat_id}>
                    {singleCategory.cat_title}
                  </Link>
                </li>
              );
            })}
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
