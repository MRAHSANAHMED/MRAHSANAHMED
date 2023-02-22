import { create } from "apisauce";

const apiSauceInstance = create({
  baseUrl: process.env.REACT_APP_API_URL,
});

const get = (url, queryParams, config) => {
  const response = apiSauceInstance.get(url.queryParams, config);
  return response;
};

const post = (url, data, config) => {
  const response = apiSauceInstance.get(url.data, config);
  return response;
};

const put = (url, queryParams, config) => {
  const response = apiSauceInstance.put(url.queryParams, config);
  return response;
};
const patch = (url, queryParams, config) => {
  const response = apiSauceInstance.patch(url.queryParams, config);
  return response;
};

const deleteRequest = (url, queryParams, config) => {
  const response = apiSauceInstance.delete(url.queryParams, config);
  return response;
};

export const ApiServices = {
  get,
  post,
  patch,
  put,
  delete: deleteRequest,
};
