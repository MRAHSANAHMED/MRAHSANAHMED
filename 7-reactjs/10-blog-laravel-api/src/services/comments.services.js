import { ApiServices } from "../utilities/Api.services";

const commentServiceUrl = {
  comments: "/comments",
};

const getComments = () => {
  const response = ApiServices.get(commentServiceUrl.comments);
  return response;
};

const deleteCommentById = (commentId) => {
  const response = ApiServices.delete(
    `${commentServiceUrl.comments}/${commentId}`
  );
  return response;
};

const commentApprove = (commentId) => {
  const response = ApiServices.get(
    `${commentServiceUrl.comments}/approve/${commentId}`
  );
  return response;
};

const commentUnApprove = (commentId) => {
  const response = ApiServices.get(
    `${commentServiceUrl.comments}/unapprove/${commentId}`
  );
  return response;
};

export const CommentService = {
  getComments,
  deleteCommentById,
  commentApprove,
  commentUnApprove,
};
