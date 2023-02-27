import { ApiServices } from "../utilities/Api.services";

const getCategories = (data) => {
  const response = ApiServices.get(categoryServiceUrl.get);
  return response;
};
export const CategoryService = {
  getCategories,
};
