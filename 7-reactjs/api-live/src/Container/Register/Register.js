import { Button, Form, Input, Typography } from "antd";
import "./Register.css";

const onFinish = async (values) => {
  //   console.log("Success:", values);
  const baseApiUrl = process.env.REACT_APP_API_URL;

  await fetch(`${baseApiUrl}/login`, {
    method: "POST",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify(values),
  })
    .then((response) => response.json())
    .then((response) => {
      const {
        results: { token },
      } = response;

      localStorage.setItem("TOKEN", token);
      //   localStorage.setItem("TOKEN", response?.results?.token);
    })
    .catch(console.error);
};
const onFinishFailed = (errorInfo) => {
  //   console.log("Failed:", errorInfo);
};

const { Title } = Typography;
const Register = () => (
  <div className="custom-login-container">
    <Title level={2} className="custom-heading-login">
      Register
    </Title>
    <Form
      name="basic"
      initialValues={{
        remember: true,
      }}
      onFinish={onFinish}
      onFinishFailed={onFinishFailed}
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
        <Button type="primary" htmlType="submit">
          Submit
        </Button>
      </Form.Item>
    </Form>
  </div>
);
export default Register;
