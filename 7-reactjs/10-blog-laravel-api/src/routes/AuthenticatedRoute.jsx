import React from "react";
import { Route, Routes } from "react-router-dom";
import CustomLayout from "../Components/CustomLayout/CustomLayout";
import Dashboard from "../Container/Dashboard/Dashboard";
import Categories from "../Container/Categories/Categories";
import { authenticatedRoutes } from "../utilities/util.constant";

function AuthenticatedRoute() {
  return (
    <Routes>
      <Route element={<CustomLayout />}>
        <Route path={authenticatedRoutes.DASHBOARD} element={<Dashboard />} />
        <Route path={authenticatedRoutes.CATEGORIES} element={<Categories />} />
      </Route>
    </Routes>
  );
}

export default AuthenticatedRoute;
