import { Button, Form, Input, message, Typography } from "antd";
import React from "react";
import { useMutation } from "react-query";
import { useNavigate } from "react-router-dom";
import { CategoriesService } from "../../../services/categories.service";
import { authenticatedRoutes } from "../../../utilities/util.constant";

function CategoryAddEdit() {
  const { Title } = Typography;
  const navigate = useNavigate();
  const [form] = Form.useForm();
  const [messageApi, contextHolder] = message.useMessage();
  const { mutateAsync: addCategoryRequest, isLoading: addCategoryLoader } =
    useMutation(CategoriesService.addCategories);

  const onFinishHandler = async (values) => {
    await addCategoryRequest(values);
    messageApi.success("category created successfully!");
    form.resetFields();
    navigate(authenticatedRoutes.CATEGORIES);
  };

  return (
    <div className="add-edit-category">
      {contextHolder}
      <Title level={2} className="custom-heading-login">
        Add Category
      </Title>
      <Form
        name="basic"
        autoComplete="off"
        onFinish={onFinishHandler}
        form={form}
      >
        <Form.Item
          name="cat_title"
          rules={[
            {
              required: true,
              message: "Please input your category title!",
            },
          ]}
        >
          <Input placeholder="Category Title" />
        </Form.Item>

        <Form.Item>
          <Button type="primary" htmlType="submit" loading={addCategoryLoader}>
            Create Category
          </Button>
        </Form.Item>
      </Form>
    </div>
  );
}

export default CategoryAddEdit;
