import { ApiServices } from "../utilities/Api.services";

const login = (data) => {
  const response = ApiServices.post("login", data);
  return response;
};

export const UserService = {
  login,
};
