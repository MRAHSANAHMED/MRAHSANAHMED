import React from "react";
import { useMutation, useQuery } from "react-query";
import { useNavigate } from "react-router-dom";
import { Button, message, Modal, Space } from "antd";
import { ExclamationCircleOutlined } from "@ant-design/icons";
import { CategoryService } from "../../services/categories.service.js";
import {
  authenticatedRoutes,
  globalReactQueryOptions,
} from "../../utilities/util.constant";
import "./Categories.css";
import GridViewTable from "../../Components/GridViewTable/GridViewTable.jsx";

function Categories() {
  const { confirm } = Modal;
  const navigate = useNavigate();
  const [messageApi, contextHolder] = message.useMessage();

  const reactQueryName = "categories";
  const reactQueryApiCallPromise = CategoryService.getCategories;
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
  } = useMutation(CategoryService.deleteCategory);

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
          // console.log("Cancel");
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
            <Button
              type="primary"
              onClick={() => {
                const editCategoryUrl =
                  authenticatedRoutes.EDIT_CATEGORY.replace(
                    ":id",
                    record.cat_id
                  );
                navigate(editCategoryUrl);
              }}
            >
              Edit{" "}
            </Button>
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
    <>
      {contextHolder}
      <GridViewTable
        columns={columns}
        dataSource={categoryData?.data?.results}
        loading={categoryLoading || deleteCategoryLoader}
        isAddButtonEnable
        addBtnTitle="Add Category"
        addBtnClick={() => {
          navigate(authenticatedRoutes.ADD_CATEGORY);
        }}
      />
    </>
  );
}

export default Categories;
