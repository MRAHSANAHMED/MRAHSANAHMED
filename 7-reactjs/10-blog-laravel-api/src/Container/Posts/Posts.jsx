import { Badge, Button } from "antd";
import confirm from "antd/es/modal/confirm";
import React from "react";
import { useMutation, useQuery } from "react-query";
import { useNavigate } from "react-router-dom";
import { PostService } from "../../services/posts.service";
import {
  authenticatedRoutes,
  globalReactQueryOptions,
} from "../../utilities/util.constant";
import { UtilService } from "../../utilities/util.service";
import { ExclamationCircleOutlined } from "@ant-design/icons";
import GridViewTable from "../../Components/GridViewTable/GridViewTable";

function Posts() {
  const navigate = useNavigate();
  const queryName = "posts";
  const {
    data: postsData,
    isLoading: postsLoading,
    refetch: refetchPosts,
  } = useQuery(queryName, PostService.getPosts, {
    ...globalReactQueryOptions,
    staleTime: 0, //cache expiry time
  });
  const { mutateAsync: postDeleteRequest, isLoading: postDeleteLoading } =
    useMutation(PostService.deletePostById);

  //   console.log(postsData, "postsData");
  const postListingColumns = [
    {
      title: "Post Id",
      key: "id",
      render: (record) => {
        return record.id;
      },
    },
    {
      title: "Post Title",
      key: "post_title",
      render: (record) => {
        return record.post_title;
      },
    },
    {
      title: "Post Author",
      key: "post_author",
      render: (record) => {
        return record.post_author;
      },
    },

    {
      title: "Post Date",
      key: "post_date",
      render: (record) => {
        return UtilService.convertDateToOurFormat(record.post_date);
      },
    },

    {
      title: "Post Status",
      key: "post_status",
      render: (record) => {
        return (
          <Badge
            count={record?.post_status?.toUpperCase()}
            color={record?.post_status === "draft" ? "green" : "#faad14"}
          />
        );
      },
    },

    {
      title: "Post Image",
      key: "post_image",
      render: (record) => {
        if (!record.image) {
          return <p>No Image Found!</p>;
        }

        return (
          <img src={record?.image} alt={record.post_title} className="w-100" />
        );
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
      title: "Edit",
      key: "edit",
      render: (text, record) => {
        return (
          <Button
            type="primary"
            ghost
            onClick={() => {
              navigate(authenticatedRoutes.EDIT_POST.replace(":id", record.id));
            }}
          >
            Edit
          </Button>
        );
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
            onClick={() => deleteHandler(record?.id)}
          >
            Delete
          </Button>
        );
      },
    },
  ];
  const deleteHandler = async (postId) => {
    if (postId) {
      confirm({
        title: "Do you want to delete this post?",
        icon: <ExclamationCircleOutlined />,
        onOk() {
          postDeleteRequest(postId, {
            onSuccess: () => {
              refetchPosts();
            },
          });
        },
      });
    }
  };
  return (
    <GridViewTable
      columns={postListingColumns}
      dataSource={postsData?.data?.results || []}
      loading={postsLoading || postDeleteLoading}
      isAddButtonEnable
      addBtnTitle="Add Post"
      addBtnClick={() => {
        navigate(authenticatedRoutes.ADD_POST);
      }}
    />
  );
}

export default Posts;
