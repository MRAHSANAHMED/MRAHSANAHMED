import React from "react";
import { Route, Routes } from "react-router-dom";
import Login from "../Container/Login/Login";
import Register from "../Container/Register/Register";
import { unAuthenticatedRoutes } from "../utilities/util.constant";

function UnAuthenticatedRoute() {
  return (
    <Routes>
      <Route path={unAuthenticatedRoutes.LOGIN} element={<Login />} />
      <Route path={unAuthenticatedRoutes.REGISTER} element={<Register />} />
    </Routes>
  );
}

export default UnAuthenticatedRoute;
