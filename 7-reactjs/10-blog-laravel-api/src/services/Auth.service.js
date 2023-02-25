import { APP_TOKEN_NAME } from "../utilities/util.constant";

const isUserIsLogin = () => {
  const token = localStorage.getItem(APP_TOKEN_NAME);
  if (!token) {
    return false;
  }

  return true;
};

export const AuthService = {
  isUserIsLogin,
};
