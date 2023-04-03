import { ApiServices } from "../utilities/Api.services";

const postServiceUrl = {
  get: "/posts",
};

const getPosts = () => {
  const response = ApiServices.get(postServiceUrl.get);
  return response;
};

const addPost = (payload) => {
  const response = ApiServices.post(postServiceUrl.get, payload);
  return response;
};
const deletePosts = (postId) => {
  const response = ApiServices.delete(`${postServiceUrl.get}/${postId}`);
  return response;
};

const getPostsById = (postId) => {
  const response = ApiServices.get(`${postServiceUrl.get}/${postId}`);
  return response;
};

const updatePostsById = (postId, payload) => {
  const response = ApiServices.put(`${postServiceUrl.get}/${postId}`, payload);
  return response;
};

const deletePostById = (postId) => {
  const response = ApiServices.delete(`${postServiceUrl.get}/${postId}`);
  return response;
};
export const PostService = {
  getPosts,
  deletePosts,
  addPost,
  getPostsById,
  updatePostsById,
  deletePostById,
};
