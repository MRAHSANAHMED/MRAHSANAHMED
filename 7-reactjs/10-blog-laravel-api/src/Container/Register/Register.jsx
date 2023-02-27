import { Button, Form, Input, message, Typography } from "antd";
import { useState } from "react";
import { Link, Navigate } from "react-router-dom";
import CustomUpload from "../../Components/CustomUpload/CustomUpload";
import { unAuthenticatedRoutes } from "../../utilities/util.constant";
import { UserService } from "../../services/users.services";
import "./Register.css";
import { useMutation } from "react-query";

const { Title } = Typography;
const Register = () => {
  const registerPromise = async (formData) => {
    return await UserService.register(formData);
  };
  const { mutateAsync: mutateRegister, isLoading: loading } = useMutation(
    registerPromise,
    {
      onSuccess: () => {
        messageApi.success("YOU ARE SUCCESSFULLY REGISTERED!");
      },
    }
  );
  const [file, setFile] = useState(null);
  const [messageApi, contextHolder] = message.useMessage();
  const onFinish = async (values) => {
    const formData = new FormData();
    formData.append("username", values.username);
    formData.append("user_firstname", values.firstName);
    formData.append("user_lastname", values.lastName);
    formData.append("email", values.email);
    formData.append("password", values.password);
    formData.append("c_password", values.password);
    if (file) {
      formData.append("user_image", file);
    }
    await mutateRegister(formData);
  };

  const customRequestCallback = (file) => {
    setFile(file);
  };

  return (
    <div className="custom-login-container">
      {contextHolder}
      <Title level={2} className="custom-heading-login">
        Register
      </Title>
      <Form name="basic" onFinish={onFinish} autoComplete="off">
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
            Register
          </Button>
          <Link to={unAuthenticatedRoutes.LOGIN} className="login-btn">
            Login
          </Link>
        </Form.Item>
      </Form>
    </div>
  );
};
export default Register;
