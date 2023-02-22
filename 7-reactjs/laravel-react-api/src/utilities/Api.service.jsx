import { create } from "apisauce";

const apiSauceInstance = create({
  baseURL: process.env.REACT_APP_API_URL,
});

const get = (url, queryParams, config) => {
  const response = apiSauceInstance.get(url, queryParams, config);
  return response;
};

const post = (url, data, config) => {
  const response = apiSauceInstance.post(url, data, config);
  return response;
};

const put = (url, data, config) => {
  const response = apiSauceInstance.post(url, data, config);
  return response;
};

const patch = (url, data, config) => {
  const response = apiSauceInstance.post(url, data, config);
  return response;
};

//  https://blog-api-testing.squadcodersdev.com/api/post/delete?id=2&post_name=2222

const deleteRequest = (url, queryParams, config) => {
  const response = apiSauceInstance.delete(url, queryParams, config);
  return response;
};

apiSauceInstance.addAsyncRequestTransform((request) => {
  if (AuthService.isUserisLogin()) {
    request.headers["Authorization"] = `Bearer ${AuthService.getUserToken()}`;
  }
});

export const ApiService = {
  get,
  post,
  put,
  patch,
  delete: deleteRequest,
};
