import { Button, message, Modal } from "antd";
import React from "react";
import { ExclamationCircleOutlined } from "@ant-design/icons";
import { useMutation, useQuery } from "react-query";
import { useNavigate } from "react-router-dom";
import GridViewTable from "../../Components/GridViewTable/GridViewTable";
import { UserService } from "../../services/users.services";
import {
  authenticatedRoutes,
  globalReactQueryOptions,
} from "../../utilities/util.constant";
import { UtilService } from "../../utilities/util.service";

function Users() {
  const navigate = useNavigate();
  const { confirm } = Modal;
  const [messageApi, contextHolder] = message.useMessage();
  const {
    data: userData,
    isLoading: userListingLoader,
    refetch: refetchUsers,
  } = useQuery("users", UserService.getUsers, {
    ...globalReactQueryOptions,
  });
  // const {mutateAsync:deleteUserByIdRequest} = useMutation((userId) => UserService.deleteUserById(userId))
  const { mutateAsync: deleteUserByIdRequest, isLoading: deleteUserLoader } =
    useMutation(UserService.deleteUserById);

  const columns = [
    {
      title: "User Id",
      key: "user_id",
      dataIndex: "user_id",
      // render:(record)=>{
      //     return record.user_id;
      // }
    },
    // {
    //   title: "User Name",
    //   key: "username",
    //   dataIndex: "name",
    // },
    {
      title: "First Name",
      key: "user_firstname",
      dataIndex: "user_firstname",
    },
    {
      title: "Last Name",
      key: "user_lastname",
      dataIndex: "user_lastname",
    },
    {
      title: "Email",
      key: "email",
      dataIndex: "email",
    },
    {
      title: "User Role",
      dataIndex: "user_role",
      key: "user_role",
    },
    {
      title: "User Image",
      key: "user_image",
      render: (record) => {
        if (!record.user_image) {
          return <p>No Image Found!</p>;
        }
        return (
          <img src={record?.user_image} alt={record.username} width="100" />
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
              // navigate(authenticatedRoutes.EDIT_USER.replace(":id", record.user_id));
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
            onClick={() => deleteHandler(record?.user_id)}
          >
            Delete
          </Button>
        );
      },
    },
  ];

  const deleteHandler = async (userId) => {
    confirm({
      title: "Do you want to delete this user?",
      icon: <ExclamationCircleOutlined />,
      onOk() {
        deleteUserByIdRequest(userId, {
          onSuccess: () => {
            messageApi.success("user is deleted successfully!");
            refetchUsers();
          },
        });
      },
      onCancel() {
        // console.log("Cancel");
      },
    });
  };

  return (
    <>
      {contextHolder}
      <GridViewTable
        loading={userListingLoader || deleteUserLoader}
        columns={columns}
        dataSource={userData?.data?.results}
        isAddButtonEnable
        addBtnTitle="Add User"
        addBtnClick={() => {
          navigate(authenticatedRoutes.ADD_USERS);
        }}
      />
    </>
  );
}

export default Users;
