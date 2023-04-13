/* eslint-disable jsx-a11y/anchor-is-valid */
import React, { useMemo } from "react";
import "../../assets/frontend/css/bootstrap.min.css";
import "../../assets/frontend/css/blog-home.css";
import FrontendHeader from "../../FrontendComponents/FrontendHeader/FrontendHeader";
import FrontendSidebar from "../../FrontendComponents/FrontendSidebar/FrontendSidebar";
import FrontendFooter from "../../FrontendComponents/FrontendFooter/FrontendFooter";
import { useQuery } from "react-query";
import { globalReactQueryOptions } from "../../utilities/util.constant";
import CustomLoader from "../../Container/CustomLoader/CustomLoader";
import { CategoryService } from "../../services/categories.service";

function FrontendLayout(props) {
  const { children } = props;

  const { data: categories, isLoading: categoryLoader } = useQuery(
    ["categories"],
    CategoryService.getCategories,
    {
      ...globalReactQueryOptions,
    }
  );

  const categoriesData = useMemo(
    () => categories?.data?.results,
    [categories?.data?.results]
  );

  if (categoryLoader) {
    return <CustomLoader />;
  }

  return (
    <div>
      <FrontendHeader categoriesData={categoriesData} />
      <div class="container">
        <div class="row">
          <div class="col-md-8">{children}</div>

          <FrontendSidebar categoriesData={categoriesData} />
        </div>

        <FrontendFooter />
      </div>

      <script src="js/jquery.js"></script>

      <script src="js/bootstrap.min.js"></script>
    </div>
  );
}

export default FrontendLayout;
