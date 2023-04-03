import { ApiServices } from "../utilities/Api.services";

const postsServiceUrl = {
  get: "/posts",
};

const getPosts = () => {
  const response = ApiServices.get(postsServiceUrl.get);
  return response;
};

const addPost = (payload) => {
  const response = ApiServices.post(postsServiceUrl.get, payload);
  return response;
};
const deletePosts = (postsId) => {
  const response = ApiServices.delete(`${postsServiceUrl.get}/${postsId}`);
  return response;
};

const getPostsById = (postsId) => {
  const response = ApiServices.get(`${postsServiceUrl.get}/${postsId}`);
  return response;
};

const updatePostsById = (postsId, payload) => {
  const response = ApiServices.put(
    `${postsServiceUrl.get}/${postsId}`,
    payload
  );
  return response;
};

const deletePostById = (postId) => {
  const response = ApiServices.delete(`${postsServiceUrl.get}/${postId}`);
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
