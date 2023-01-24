import React from "react";
import { Link, Outlet } from "react-router-dom";

function LayoutOne() {
  return (
    <>
      <nav>
        <ul>
          <li>
            <Link to="/">Home</Link>
          </li>
          <li>
            <Link to="/about">About</Link>
          </li>
          <li>
            <Link to="/contact">Contact</Link>
          </li>
          <li>
            <Link to="/product/1/1">ProductDetail 1</Link>
          </li>
          <li>
            <Link to="/product/2/2">ProductDetail 2</Link>
          </li>
          <li>
            <Link to="/product/3/3">ProductDetail 3</Link>
          </li>
        </ul>
      </nav>
      <Outlet />
      <footer>
        <h4>footer one</h4>
      </footer>
    </>
  );
}

export default LayoutOne;
