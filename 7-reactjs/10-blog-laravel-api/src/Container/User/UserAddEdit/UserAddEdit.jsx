import { Button, Form, Input, message, Select, Typography } from "antd";

import { useState } from "react";
import { useMutation } from "react-query";
import { useNavigate } from "react-router-dom";
import { UserService } from "../../../services/users.services";
import { authenticatedRoutes } from "../../../utilities/util.constant";
import CustomUpload from "../../../Components/CustomUpload/CustomUpload";

const UserAddEdit = () => {
  const navigate = useNavigate();
  const [form] = Form.useForm();
  const { Title } = Typography;
  const { mutateAsync: mutateAddUser, isLoading: loading } = useMutation(
    UserService.register,
    {
      onSuccess: () => {
        messageApi.success("user is regsitered successfully!");
      },
    }
  );

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

    await mutateAddUser(formData, {
      onSuccess: () => {
        messageApi.success("user is created successfully");
        form.resetFields();
        navigate(authenticatedRoutes.USERS);
      },
    });
  };

  const customRequestCallback = (info) => {
    setFile(info.file);
  };

  return (
    <div>
      {contextHolder}
      <Title level={2} className="custom-heading-login">
        Add User
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
          <Button type="primary" htmlType="submit" loading={loading}>
            Add User
          </Button>
        </Form.Item>
      </Form>
    </div>
  );
};
export default UserAddEdit;
