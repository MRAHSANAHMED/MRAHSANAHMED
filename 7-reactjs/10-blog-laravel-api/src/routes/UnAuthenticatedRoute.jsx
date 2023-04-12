import React from "react";
import { Route, Routes } from "react-router-dom";
import Login from "../Container/Login/Login";
import Register from "../Container/Register/Register";
import { unAuthenticatedRoutes } from "../utilities/util.constant";
import Home from "../Pages/Home/Home";

function UnAuthenticatedRoute() {
  return (
    <Routes>
      <Route path={unAuthenticatedRoutes.LOGIN} element={<Login />} />
      <Route path={unAuthenticatedRoutes.REGISTER} element={<Register />} />
      <Route path={unAuthenticatedRoutes.HOME} element={<Home />} />
    </Routes>
  );
}

export default UnAuthenticatedRoute;
