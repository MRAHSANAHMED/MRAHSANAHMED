import React from "react";
import { Route, Routes } from "react-router-dom";
import CustomLayout from "../Components/CustomLayout/CustomLayout";
import Dashboard from "../Container/Dashboard/Dashboard";

function AuthenticatedRoute() {
  return (
    <Routes>
      <Route element={<CustomLayout />}>
        <Route path="/" element={<Dashboard />} />
      </Route>
    </Routes>
  );
}

export default AuthenticatedRoute;
