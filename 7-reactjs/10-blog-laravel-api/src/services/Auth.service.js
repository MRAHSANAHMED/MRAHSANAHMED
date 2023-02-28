import { APP_TOKEN_NAME } from "../utilities/util.constant";

const isUserIsLogin = () => {
  const token = localStorage.getItem(APP_TOKEN_NAME);
  if (!token) {
    return false;
  }

  return true;
};

const getUserToken = () => {
  const token = localStorage.getItem(APP_TOKEN_NAME);
  return token;
};

export const AuthService = {
  isUserIsLogin,
  getUserToken,
};
