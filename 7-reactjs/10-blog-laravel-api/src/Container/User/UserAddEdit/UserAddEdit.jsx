/* eslint-disable react-hooks/exhaustive-deps */
import { Button, Form, Input, message, Select, Typography } from "antd";

import { useEffect, useState } from "react";
import { useMutation, useQuery } from "react-query";
import { useNavigate, useParams } from "react-router-dom";
import { UserService } from "../../../services/users.services";
import {
  authenticatedRoutes,
  globalReactQueryOptions,
} from "../../../utilities/util.constant";
import CustomUpload from "../../../Components/CustomUpload/CustomUpload";

const UserAddEdit = () => {
  const navigate = useNavigate();
  const { id: userId } = useParams();
  const [form] = Form.useForm();
  const { Title } = Typography;
  const { mutateAsync: mutateAddUser, isLoading: loading } = useMutation(
    UserService.register
  );

  const {
    mutateAsync: mutateUpdateUserByIdRequest,
    isLoading: updateByUserIdLoader,
  } = useMutation((payload) => UserService.updateUserById(userId, payload));

  const { data: getUserByIdData, isLoading: getUserByIdLoader } = useQuery(
    ["users", userId],
    () => UserService.getUserById(userId),
    {
      ...globalReactQueryOptions,
      enabled: Boolean(userId),
    }
  );

  const singleUser = getUserByIdData?.data?.results;

  useEffect(() => {
    if (singleUser) {
      form.setFieldsValue({
        username: singleUser.username,
        firstName: singleUser.user_firstname,
        lastName: singleUser.user_lastname,
        email: singleUser.email,
        user_role: singleUser.user_role,
      });
    }
  }, [getUserByIdData]);
  const [file, setFile] = useState(null);
  const [messageApi, contextHolder] = message.useMessage();

  const onFinish = async (values) => {
    //we are usign the form data for file uploading
    const formData = new FormData();
    formData.append("username", values.username);
    formData.append("user_firstname", values.firstName);
    formData.append("user_lastname", values.lastName);
    formData.append("email", values.email);
    formData.append("password", values.password);
    formData.append("c_password", values.password);
    formData.append("user_role", values.user_role);
    if (file) {
      formData.append("user_image", file); //file will be in binary format
    }

    if (userId) {
      await mutateUpdateUserByIdRequest(formData, {
        onSuccess: () => {
          messageApi.success("user is Update Successfully");
          form.resetFields();
          navigate(authenticatedRoutes.USERS);
        },
      });
    } else {
      await mutateAddUser(formData, {
        onSuccess: () => {
          messageApi.success("user is created successfully");
          form.resetFields();
          navigate(authenticatedRoutes.USERS);
        },
      });
    }
  };

  const customRequestCallback = (info) => {
    setFile(info.file);
  };

  return (
    <div>
      {contextHolder}
      <Title level={2} className="custom-heading-login">
        {userId ? "Update" : "Add"} User
      </Title>
      <Form name="basic" onFinish={onFinish} autoComplete="off" form={form}>
        <Form.Item
          name="username"
          rules={[
            {
              required: true,
              message: "Please input your username!",
            },
          ]}
        >
          <Input placeholder="User Name" />
        </Form.Item>

        <Form.Item
          name="firstName"
          rules={[
            {
              required: true,
              message: "Please input your first name!",
            },
          ]}
        >
          <Input placeholder="Firstname" />
        </Form.Item>

        <Form.Item
          name="lastName"
          rules={[
            {
              required: true,
              message: "Please input your last Name!",
            },
          ]}
        >
          <Input placeholder="Last Name" />
        </Form.Item>
        <Form.Item
          name="email"
          rules={[
            {
              required: true,
              message: "Please input your email!",
            },
          ]}
        >
          <Input placeholder="Email" />
        </Form.Item>

        <Form.Item
          name="user_role"
          rules={[
            {
              required: true,
              message: "Please select your user role!",
            },
          ]}
        >
          <Select placeholder="Select Role">
            <Select.Option value="Subcriber">Subcriber</Select.Option>
            <Select.Option value="Admin">Admin</Select.Option>
          </Select>
        </Form.Item>

        <Form.Item>
          <CustomUpload customRequestCallback={customRequestCallback} />
          {singleUser?.user_image && (
            <img
              src={singleUser?.user_image}
              alt={singleUser?.username}
              width={200}
              style={{ marginTop: 20 }}
            />
          )}
        </Form.Item>

        <Form.Item
          name="password"
          rules={[
            {
              required: true,
              message: "Please input your password!",
            },
          ]}
        >
          <Input.Password placeholder="Password" />
        </Form.Item>

        <Form.Item>
          <Button
            type="primary"
            htmlType="submit"
            loading={loading || getUserByIdLoader || updateByUserIdLoader}
          >
            {userId ? "Update" : "Create"} User
          </Button>
        </Form.Item>
      </Form>
    </div>
  );
};
export default UserAddEdit;
