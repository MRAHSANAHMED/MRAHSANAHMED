import { create } from "apisauce";

const apiSauceInstance = create({
  baseURL: process.env.REACT_APP_API_URL,
  // baseUrl: "https://blog-api-testing.squadcodersdev.com/api",
});
// console.log(apiSauceInstance, "baseUrl");
const get = (url, queryParams, config) => {
  const response = apiSauceInstance.get(url, queryParams, config);
  return response;
};

const post = (url, data, config) => {
  const response = apiSauceInstance.post(url, data, config);
  return response;
};

const put = (url, queryParams, config) => {
  const response = apiSauceInstance.put(url, queryParams, config);
  return response;
};
const patch = (url, queryParams, config) => {
  const response = apiSauceInstance.patch(url, queryParams, config);
  return response;
};

const deleteRequest = (url, queryParams, config) => {
  const response = apiSauceInstance.delete(url, queryParams, config);
  return response;
};

export const ApiServices = {
  get,
  post,
  patch,
  put,
  delete: deleteRequest,
};
