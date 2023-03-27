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

const getCategoryById = (categoryId) => {
  const response = ApiServices.get(`${categoryServiceUrl.get}/${categoryId}`);
  return response;
};

const updateCategoryById = (categoryId, payload) => {
  const response = ApiServices.put(
    `${categoryServiceUrl.get}/${categoryId}`,
    payload
  );
  return response;
};
export const CategoryService = {
  getCategories,
  deleteCategory,
  addCategories,
  getCategoryById,
  updateCategoryById,
};
