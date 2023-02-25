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
} from "../../utilities/util.constant";
const logoutClickHandler = (event) => {
  event.preventDefault();
  localStorage.removeItem(APP_TOKEN_NAME);
  window.location.href = unAuthenticatedRoutes.LOGIN;
};
export const sidebarItems = [
  {
    icon: <PieChartOutlined />,
    label: <Link>Categories</Link>,
    key: "categories",
  },
  {
    icon: <UserOutlined />,
    label: <Link>Users</Link>,
    key: "users",
  },
  {
    icon: <DesktopOutlined />,
    label: <Link>Posts</Link>,
    key: "posts",
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
