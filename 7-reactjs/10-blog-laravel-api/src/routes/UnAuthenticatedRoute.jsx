import React from "react";
import { Route, Routes } from "react-router-dom";
import Login from "../Container/Login/Login";
import Register from "../Container/Register/Register";
import Home from "../Pages/Home/Home";
import PostDetail from "../Pages/PostDetail/PostDetail";
import { unAuthenticatedRoutes } from "../utilities/util.constant";

function UnAuthenticatedRoute() {
  return (
    <Routes>
      <Route path={unAuthenticatedRoutes.LOGIN} element={<Login />} />
      <Route path={unAuthenticatedRoutes.REGISTER} element={<Register />} />
      <Route path={unAuthenticatedRoutes.HOME} element={<Home />} />
      <Route
        path={unAuthenticatedRoutes.POST_DETAIL}
        element={<PostDetail />}
      />
    </Routes>
  );
}
export default UnAuthenticatedRoute;
