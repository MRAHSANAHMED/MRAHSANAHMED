import { Button, Form, Input, message, Typography } from "antd";
import React, { useEffect } from "react";
import { useMutation, useQuery } from "react-query";
import { useNavigate, useParams } from "react-router-dom";
import { CategoryService } from "../../../services/categories.service";
import {
  authenticatedRoutes,
  globalReactQueryOptions,
} from "../../../utilities/util.constant";

function CategoryAddEdit() {
  const { Title } = Typography;
  const { id: categoryId } = useParams();
  const navigate = useNavigate();
  const [form] = Form.useForm();
  const [messageApi, contextHolder] = message.useMessage();
  const { mutateAsync: addCategoryRequest, isLoading: addCategoryLoader } =
    useMutation(CategoryService.addCategories);

  const {
    mutateAsync: updateCategoryRequest,
    isLoading: updateCategoryLoader,
  } = useMutation(async ({ categoryIdParam, payload }) => {
    await CategoryService.updateCategoryById(categoryIdParam, payload);
  });
  const editQueryFunction = async () =>
    await CategoryService.getCategoryById(categoryId);

  const { data: editCategoryData, isLoading: categoryEditLoader } = useQuery(
    "category_edit",
    editQueryFunction,
    {
      ...globalReactQueryOptions,
      enabled: Boolean(categoryId),
    }
  );
  useEffect(() => {
    if (editCategoryData?.data?.results) {
      const singleCategoryObject = editCategoryData?.data?.results;
      form.setFieldsValue({
        cat_title: singleCategoryObject?.cat_title,
      });
      // console.log(editCategoryData);
    }
  }, [editCategoryData, form]);

  const onFinishHandler = async (values) => {
    if (Boolean(categoryId)) {
      await updateCategoryRequest({
        categoryIdParam: categoryId,
        payload: values,
      });
    } else {
      await addCategoryRequest(values);
    }

    messageApi.success("category created successfully!");
    form.resetFields();
    navigate(authenticatedRoutes.CATEGORIES);
  };

  return (
    <div className="add-edit-category">
      {contextHolder}
      <Title level={2} className="custom-heading-login">
        {Boolean(categoryId) ? "Update" : "Create"} Category
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
          <Button
            type="primary"
            htmlType="submit"
            loading={
              addCategoryLoader || categoryEditLoader || updateCategoryLoader
            }
          >
            {Boolean(categoryId) ? "Update" : "Create"} Category
          </Button>
        </Form.Item>
      </Form>
    </div>
  );
}

export default CategoryAddEdit;
