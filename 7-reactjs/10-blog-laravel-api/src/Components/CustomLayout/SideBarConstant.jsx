import React from "react";
import { Link } from "react-router-dom";
import {
  DesktopOutlined,
  FileOutlined,
  PieChartOutlined,
  UserOutlined,
  LogoutOutlined,
} from "@ant-design/icons";
import {
  APP_TOKEN_NAME,
  unAuthenticatedRoutes,
  authenticatedRoutes,
} from "../../utilities/util.constant";

const logoutClickHandler = (event) => {
  event.preventDefault();
  localStorage.removeItem(APP_TOKEN_NAME);
  window.location.href = unAuthenticatedRoutes.LOGIN;
};
export const sidebarItems = [
  {
    icon: <PieChartOutlined />,
    label: <Link to={authenticatedRoutes.DASHBOARD}>Dashboard</Link>,
    key: "dashboard",
  },
  {
    icon: <PieChartOutlined />,
    label: <Link to={authenticatedRoutes.CATEGORIES}>Categories</Link>,
    key: "categories",
  },
  {
    icon: <DesktopOutlined />,
    label: <Link to={authenticatedRoutes.POSTS}>Posts</Link>,
    key: "posts",
  },
  {
    icon: <UserOutlined />,
    label: <Link to={authenticatedRoutes.USERS}>Users</Link>,
    key: "users",
  },
  {
    icon: <FileOutlined />,
    label: <Link>Comments</Link>,
    key: "comments",
  },
  {
    label: <div onClick={logoutClickHandler}>Logout</div>,
    key: "logout",
    icon: <LogoutOutlined />,
  },
];
