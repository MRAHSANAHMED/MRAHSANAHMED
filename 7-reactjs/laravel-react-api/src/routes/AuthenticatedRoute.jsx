import React from "react";
import { Route, Routes } from "react-router-dom";
import { AuthenticatedRoutes } from "../utilities/util.constant";

function AuthenticatedRoute() {
  return (
    <Routes>
      {/* nested routing define routing with nesting */}
      <Route element={<CustomLayout />}>
        <Route path={AuthenticatedRoutes.DASHBOARD} element={<Dashboard />} />
        <Route path={AuthenticatedRoutes.CATEGORIES} element={<Categories />} />
        <Route
          path={AuthenticatedRoutes.ADD_CATEOGRY}
          element={<CategoryAddEdit />}
        />
      </Route>
    </Routes>
  );
}

export default AuthenticatedRoute;
