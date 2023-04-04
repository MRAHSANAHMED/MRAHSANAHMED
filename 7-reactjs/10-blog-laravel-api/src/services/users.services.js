import { ApiServices } from "../utilities/Api.services";

const userServiceUrl = {
  login: "/login",
  register: "/register",
  users: "/users",
};

const login = (data) => {
  const response = ApiServices.post(userServiceUrl.login, data);
  return response;
};
const register = (data) => {
  const response = ApiServices.post(userServiceUrl.register, data);
  return response;
};
const getUsers = () => {
  const response = ApiServices.get(userServiceUrl.users);
  return response;
};
const deleteUserById = (userId) => {
  const response = ApiServices.delete(`${userServiceUrl.users}/${userId}`);
  return response;
};

export const UserService = {
  login,
  register,
  getUsers,
  deleteUserById,
};
