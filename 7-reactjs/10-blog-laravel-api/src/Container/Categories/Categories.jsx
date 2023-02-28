import React from "react";
import { useMutation, useQuery } from "react-query";
import { useNavigate } from "react-router-dom";
import { Button, Col, message, Modal, Row, Space, Table } from "antd";
import { ExclamationCircleOutlined } from "@ant-design/icons";
import { CategoriesService } from "../../services/categories.service.js";
import {
  authenticatedRoutes,
  globalReactQueryOptions,
} from "../../utilities/util.constant";
import "./Categories.css";

function Categories() {
  const { confirm } = Modal;
  const navigate = useNavigate();
  const [messageApi, contextHolder] = message.useMessage();

  const reactQueryName = "categories";
  const reactQueryApiCallPromise = CategoriesService.getCategories;
  const {
    isLoading: categoryLoading,
    data: categoryData,
    refetch: categoryRefech,
  } = useQuery(reactQueryName, reactQueryApiCallPromise, {
    ...globalReactQueryOptions,
    staleTime: 0,
  });
  const {
    mutateAsync: categoryDeleteRequest,
    isLoading: deleteCategoryLoader,
  } = useMutation(CategoriesService.deleteCategory);

  const categoryDeleteHandler = async (categoryId) => {
    if (categoryId) {
      confirm({
        title: "Do you want to delete this category?",
        icon: <ExclamationCircleOutlined />,
        onOk() {
          categoryDeleteRequest(categoryId, {
            onSuccess: () => {
              categoryRefech();
              messageApi.success("category deleted successfully !");
            },
          });
        },
        onCancel() {
          console.log("Cancel");
        },
      });
    }
  };
  const columns = [
    {
      title: "Category Id",
      key: "id",
      render: (record) => {
        return record.cat_id;
      },
    },
    {
      title: "Title",
      key: "title",
      render: (record) => record.cat_title,
    },

    {
      title: "Action",
      key: "action",
      render: (_, record) => {
        // console.log(record, "record");
        return (
          <Space size="middle">
            <Button type="primary">Edit </Button>
            <Button
              type="primary"
              onClick={() => categoryDeleteHandler(record.cat_id)}
            >
              Delete
            </Button>
          </Space>
        );
      },
    },
  ];

  return (
    <Row>
      {contextHolder}
      <Col span={24}>
        <Button
          type="primary"
          className="create-btn"
          onClick={() => {
            navigate(authenticatedRoutes.ADD_CATEGORY);
          }}
        >
          ADD CATEGORIES
        </Button>
      </Col>

      <Col span={24}>
        <Table
          columns={columns}
          dataSource={categoryData?.data?.results}
          loading={categoryLoading || deleteCategoryLoader}
        />
      </Col>
    </Row>
  );
}

export default Categories;
