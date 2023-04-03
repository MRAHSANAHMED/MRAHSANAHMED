import React from "react";
import { Route, Routes } from "react-router-dom";
import CustomLayout from "../Components/CustomLayout/CustomLayout";
import Categories from "../Container/Categories/Categories";
import CategoryAddEdit from "../Container/Categories/CategoryAddEdit/CategoryAddEdit";
import Dashboard from "../Container/Dashboard/Dashboard";
import Posts from "../Container/Posts/Posts";
import { authenticatedRoutes } from "../utilities/util.constant";
import PostAddEdit from "../../src/Container/Posts/PostAddEdit/PostAddEdit";
import User from "../Container/User/User";

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
        <Route
          path={authenticatedRoutes.EDIT_CATEGORY}
          element={<CategoryAddEdit />}
        />
        <Route path={authenticatedRoutes.POSTS} element={<Posts />} />
        <Route path={authenticatedRoutes.ADD_POST} element={<PostAddEdit />} />
        <Route path={authenticatedRoutes.EDIT_POST} element={<PostAddEdit />} />

        <Route path={authenticatedRoutes.USERS} element={<User />} />
      </Route>
    </Routes>
  );
}

export default AuthenticatedRoute;
