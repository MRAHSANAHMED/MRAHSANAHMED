import React from "react";
import { Route, Routes } from "react-router-dom";
import CustomLayout from "../Components/CustomLayout/CustomLayout";
import Categories from "../Container/Categories/Categories";
import CategoryAddEdit from "../Container/Categories/CategoryAddEdit/CategoryAddEdit";
import Dashboard from "../Container/Dashboard/Dashboard";
import Posts from "../Container/Posts/Posts";
import Users from "../Container/User/User";
import { authenticatedRoutes } from "../utilities/util.constant";
import PostAddEdit from "../../src/Container/Posts/PostAddEdit/PostAddEdit";
import UserAddEdit from "../Container/User/UserAddEdit/UserAddEdit";
import Comments from "../Container/Comments/Comments";

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

        <Route path={authenticatedRoutes.USERS} element={<Users />} />
        <Route path={authenticatedRoutes.ADD_USERS} element={<UserAddEdit />} />
        <Route
          path={authenticatedRoutes.EDIT_USERS}
          element={<UserAddEdit />}
        />
        <Route path={authenticatedRoutes.COMMENTS} element={<Comments />} />
      </Route>
    </Routes>
  );
}

export default AuthenticatedRoute;