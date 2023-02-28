import React from "react";
import { Route, Routes } from "react-router-dom";
import CustomLayout from "../Components/CustomLayout/CustomLayout";
import Categories from "../Container/Categories/Categories";
import CategoryAddEdit from "../Container/Categories/CategoryAddEdit/CategoryAddEdit";
import Dashboard from "../Container/Dashboard/Dashboard";
import { authenticatedRoutes } from "../utilities/util.constant";

function AuthenticatedRoute() {
  return (
    <Routes>
      <Route element={<CustomLayout />}>
        <Route path={authenticatedRoutes.DASHBOARD} element={<Dashboard />} />
        <Route path={authenticatedRoutes.CATEGORIES} element={<Categories />} />
        <Route
          path={authenticatedRoutes.ADD_CATEGORY}
          element={<CategoryAddEdit />}
        />
      </Route>
    </Routes>
  );
}

export default AuthenticatedRoute;
