import { ApiServices } from "../utilities/Api.services";

const categoryServiceUrl = {
  get: "/categories",
};

const getCategories = () => {
  const response = ApiServices.get(categoryServiceUrl.get);
  return response;
};

const addCategories = (payload) => {
  const response = ApiServices.post(categoryServiceUrl.get, payload);
  return response;
};
const deleteCategory = (categoryId) => {
  const response = ApiServices.delete(
    `${categoryServiceUrl.get}/${categoryId}`
  );
  return response;
};
export const CategoriesService = {
  getCategories,
  deleteCategory,
  addCategories,
};
