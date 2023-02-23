import { Button, Form, Input, message, Typography } from "antd";
import { useState } from "react";
import CustomUpload from "../../Components/CustomUpload/CustomUpload";
import { UserService } from "../../services/users.services";
import "./Register.css";

const { Title } = Typography;
const Register = () => {
  const [loading, setLoading] = useState(false);
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
    formData.append("user_image", file); //file will be in binary format

    setLoading(true);
    const { ok, data: registerData } = await UserService.register(formData);
    if (ok) {
      console.log(registerData, "registerData");
      messageApi.success("user is regsitered successfully!");
    }
    setLoading(false);
  };
  // console.log(values, "values");
  const customRequestCallback = (file) => {
    console.log("file", file);
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
        </Form.Item>
      </Form>
    </div>
  );
};
export default Register;
