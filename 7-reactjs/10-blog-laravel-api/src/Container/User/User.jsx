import { Button } from "antd";
import React from "react";
import { useQuery } from "react-query";
import { useNavigate } from "react-router-dom";
import GridViewTable from "../../Components/GridViewTable/GridViewTable";
import { UserService } from "../../services/users.services";
import {
  authenticatedRoutes,
  globalReactQueryOptions,
} from "../../utilities/util.constant";
import { UtilService } from "../../utilities/util.service";

function User() {
  const navigate = useNavigate();
  const { data: userData } = useQuery("users", UserService.getUsers, {
    ...globalReactQueryOptions,
  });

  const columns = [
    {
      title: "User Id",
      key: "user_id",
      dataIndex: "user_id",
      // render:(record)=>{
      //     return record.user_id;
      // }
    },
    {
      title: "User Name",
      key: "username",
      dataIndex: "name",
    },
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
              // navigate(authenticatedRoutes.EDIT_USER.replace(":id", record.id));
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
            //   onClick={() => deleteHandler(record?.id)}
          >
            Delete
          </Button>
        );
      },
    },
  ];
  return (
    <GridViewTable
      columns={columns}
      dataSource={userData?.data?.results}
      isAddButtonEnable
      addBtnTitle="Add User"
      addBtnClick={() => {
        navigate(authenticatedRoutes.ADD_USER);
      }}
    />
  );
}

export default User;
