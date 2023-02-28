import { ApiServices } from "../utilities/Api.services";

const categoryServiceUrl = {
  get: "/categories",
};
const getCategories = (data) => {
  const response = ApiServices.get(categoryServiceUrl.get);
  return response;
};
export const CategoriesService = {
  getCategories,
};
