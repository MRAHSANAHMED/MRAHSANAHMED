import { Button, message, Modal } from "antd";
import React from "react";
import { ExclamationCircleOutlined } from "@ant-design/icons";
import { useMutation, useQuery } from "react-query";
import { Link } from "react-router-dom";
import GridViewTable from "../../Components/GridViewTable/GridViewTable";
import { CommentService } from "../../services/comments.services";
import {
  authenticatedRoutes,
  globalReactQueryOptions,
} from "../../utilities/util.constant";
import { UtilService } from "../../utilities/util.service";
import "./Comments.css";

const { confirm } = Modal;

function Comments() {
  const {
    data: commentsData,
    isLoading: commentsLoader,
    refetch: refetchComments,
  } = useQuery("comments", CommentService.getComments, {
    ...globalReactQueryOptions,
  });
  console.log(commentsData);
  const [messageApi, contextHolder] = message.useMessage();

  const {
    mutateAsync: deleteCommentByIdRequest,
    isLoading: deleteCommentLoading,
  } = useMutation(CommentService.deleteCommentById);

  const columns = [
    {
      title: "Comment Id",
      key: "comment_id",
      render: (record) => {
        return record.comment_id;
      },
    },
    {
      title: "User",
      key: "user",
      render: (record) => {
        return (
          <Link
            to={authenticatedRoutes.EDIT_USERS.replace(
              ":id",
              record?.user?.user_id
            )}
          >
            {record?.user?.username}
          </Link>
        );
      },
    },
    {
      title: "Post",
      key: "post",
      render: (record) => {
        return (
          <Link
            to={authenticatedRoutes.EDIT_POST.replace(":id", record?.post?.id)}
          >
            {record?.post?.post_title}
          </Link>
        );
      },
    },
    {
      title: "Comment Status",
      key: "comment_status",
      render: (record) => {
        let commentStatusField;
        switch (record.comment_status) {
          case "unapproved":
            commentStatusField = (
              <span className="unapproved-btn">{record.comment_status}</span>
            );
            break;
          case "approved":
            commentStatusField = (
              <span className="approved-btn">{record.comment_status}</span>
            );
            break;
          default:
            commentStatusField = (
              <span className="default-btn">{record.comment_status}</span>
            );
            break;
        }

        return commentStatusField;
      },
    },
    {
      title: "Comment Content",
      key: "comment_content",
      render: (record) => {
        return record.comment_content;
      },
    },
    {
      title: "Created At",
      key: "created_at",
      render: (record) => {
        return UtilService.convertDateToOurFormat(record.created_at);
      },
    },

    {
      title: "Updated At",
      key: "updated_at",
      render: (record) => {
        return UtilService.convertDateToOurFormat(record.updated_at);
      },
    },
    {
      title: "Delete",
      key: "delete",
      render: (text, record, index) => {
        return (
          <Button
            type="primary"
            danger
            onClick={() => deleteHandler(record?.comment_id)}
          >
            Delete
          </Button>
        );
      },
    },
  ];

  const deleteHandler = (commentId) => {
    confirm({
      title: "Do you want to delete this comment?",
      icon: <ExclamationCircleOutlined />,
      onOk() {
        deleteCommentByIdRequest(commentId, {
          onSuccess: () => {
            messageApi.success("comment is deleted successfully");
            refetchComments();
          },
        });
      },
    });
  };
  return (
    <>
      {contextHolder}
      <GridViewTable
        loading={commentsLoader || deleteCommentLoading}
        columns={columns}
        dataSource={commentsData?.data?.results}
      />
    </>
  );
}

export default Comments;
