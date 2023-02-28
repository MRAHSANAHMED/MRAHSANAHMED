import React from "react";
import "./Categories.css";
import { Button, Col, message, Row, Space, Table } from "antd";
import { CategoriesService } from "../../services/categories.service.js";
import { useMutation, useQuery } from "react-query";
import { globalReactQueryOptions } from "../../utilities/util.constant";

function Categories() {
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
    mustateAsync: categoryDeleteRequest,
    isLoading: deleteCategoryLoader,
  } = useMutation(CategoriesService.deleteCategory);
  const categoryDeleteHandler = async (categoryId) => {
    if (categoryId) {
      await categoryDeleteRequest(categoryId, {
        onSuccess: () => {
          categoryRefech();
          messageApi.success("CATEGORY DELETED SuCCESSFULLY");
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
        console.log(record, "record");
        return (
          <Space size="middle">
            <Button type="primary">Edit </Button>
            <Button
              type="danger"
              onClick={() => categoryDeleteHandler(record.id)}
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
        <Button type="primary" className="create-btn">
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
