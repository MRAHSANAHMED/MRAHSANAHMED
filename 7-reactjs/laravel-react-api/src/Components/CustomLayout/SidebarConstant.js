import react from "react";
import {
  DesktopOutlined,
  FileOutlined,
  PieChartOutlined,
  UserOutlined,
  LoginOutlined,
} from "@ant-design/icons";
import { Link } from "react-router-dom";
import {
  APP_TOKEN_NAME,
  AuthenticatedRoutes,
  UnAuthenticatedRoutes,
} from "../../utilities/util.constant";

const logoutClickHandler = (event) => {
  event.preventDefault();
  localStorage.removeItem(APP_TOKEN_NAME);
  window.location.href = UnAuthenticatedRoutes.LOGIN;
};

export const sidebarItems = [
  {
    icon: <PieChartOutlined />,
    label: <Link to={AuthenticatedRoutes.DASHBOARD}>DASHBOARD</Link>,
    key: "dashboard",
  },
  {
    icon: <PieChartOutlined />,
    label: <Link to={AuthenticatedRoutes.CATEGORIES}>CATEGORIES</Link>,
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
    key: "users",
  },
  {
    icon: <FileOutlined />,
    label: <Link>Comments</Link>,
    key: "Comments",
  },
  {
    label: <div onClick={logoutClickHandler}>Logout</div>,
    key: "logout",
    icon: <LoginOutlined />,
  },
];
