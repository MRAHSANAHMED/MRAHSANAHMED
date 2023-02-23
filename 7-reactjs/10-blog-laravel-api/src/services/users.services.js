import { ApiServices } from "../utilities/Api.services";

const userServiceUrl = {
  login: "/login",
  register: "/register",
};

const login = (data) => {
  const response = ApiServices.post(userServiceUrl.login, data);
  return response;
};
const register = (data) => {
  const response = ApiServices.post(userServiceUrl.register, data);
  return response;
};

export const UserService = {
  login,
  register,
};
