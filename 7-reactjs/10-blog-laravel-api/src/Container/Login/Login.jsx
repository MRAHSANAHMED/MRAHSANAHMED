import { Button, Form, Input, message, Typography } from "antd";
import { useState } from "react";
import { UserService } from "../../services/users.services";
import "./Login.css";

// const onFinish = async (values) => {
//   const baseApiUrl = process.env.REACT_APP_API_URL;
//   await fetch(`${baseApiUrl}/login`, {
//     method: "POST",
//     headers: {
//       "Content-type": "application/json",
//     },
//     body: JSON.stringify(values),
//   })
//     .then((response) => response.json())
//     .then((response) => {
//       const {
//         results: { token },
//       } = response;
//       localStorage.setItem("TOKEN", token);
//     })
//     .catch(console.error);
// };
// const onFinishFailed = (errieInfo) => {};
const { Title } = Typography;
const Login = () => {
  const [loading, setLoading] = useState(false);
  const [messageApi, contextHolder] = message.useMessage();
  const onFinish = async (values) => {
    setLoading(true);

    const { ok, data: loginData } = await UserService.login(values);
    if (ok) {
      const {
        results: { token },
      } = loginData;
      localStorage.setItem("TOKEN", token);
      messageApi.success("WELCOME ,YOU ARE LOGGED IN!");
    }
  };

  return (
    <div className="custom-login-container">
      {contextHolder}
      <Title level={2} className="custom-heading-login">
        Login
      </Title>
      <Form
        name="basic"
        // initialValues={{
        //   remember: true,
        // }}
        onFinish={onFinish}
        // onFinishFailed={onFinishFailed}
        autoComplete="off"
      >
        <Form.Item
          name="email"
          rules={[
            {
              required: true,
              message: "Please input your email!",
            },
          ]}
          initialValue="retta.schimmel@example.com"
        >
          <Input placeholder="Email" />
        </Form.Item>

        <Form.Item
          name="password"
          rules={[
            {
              required: true,
              message: "Please input your password!",
            },
          ]}
          initialValue="admin123@"
        >
          <Input.Password placeholder="Password" />
        </Form.Item>

        <Form.Item>
          <Button type="primary" htmlType="submit" loading={loading}>
            Submit
          </Button>
          <a href="/">Sign up</a>
        </Form.Item>
      </Form>
    </div>
  );
};

export default Login;
