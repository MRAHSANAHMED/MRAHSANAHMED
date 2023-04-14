/* eslint-disable jsx-a11y/anchor-is-valid */
import React, { useMemo } from "react";
import "../../assets/frontend/css/bootstrap.min.css";
import "../../assets/frontend/css/blog-home.css";
import { useQuery } from "react-query";
import {
  globalReactQueryOptions,
  unAuthenticatedRoutes,
} from "../../utilities/util.constant";
import CustomLoader from "../../Components/CustomLoader/CustomLoader";
import { UtilService } from "../../utilities/util.service";
import FrontendLayout from "../../FrontendComponents/FrontendLayout/FrontendLayout";
import { Link, useParams } from "react-router-dom";
import { CategoryService } from "../../services/categories.service";

function CategoryDetail() {
  const { cat_id } = useParams();

  const { data: category, isLoading: categoryLoader } = useQuery(
    ["categories", cat_id],
    () => CategoryService.getCategoryById(cat_id),
    {
      ...globalReactQueryOptions,
      enabled: Boolean(cat_id),
    }
  );

  const postData = useMemo(
    () => category?.data?.results?.posts,
    [category?.data?.results?.posts]
  );

  if (categoryLoader) {
    return <CustomLoader />;
  }

  return (
    <FrontendLayout>
      <h1 class="page-header">
        Show Post By This Category {category?.data?.results?.cat_title}
      </h1>

      {postData?.length > 0 ? (
        postData?.map((singlePostData) => {
          return (
            <>
              <h2>
                <Link
                  to={unAuthenticatedRoutes.POST_DETAIL.replace(
                    ":post_id",
                    singlePostData?.id
                  )}
                >
                  {singlePostData?.post_title}
                </Link>
              </h2>
              <p class="lead">
                by <a href="index.php">{singlePostData?.post_author}</a>
              </p>
              <p>
                <span class="glyphicon glyphicon-time"></span> Posted on &nbsp;
                {UtilService.convertDateToOurFormat(singlePostData?.post_date)}
              </p>
              <hr />

              <Link
                to={unAuthenticatedRoutes.POST_DETAIL.replace(
                  ":post_id",
                  singlePostData?.id
                )}
              >
                {singlePostData?.image ? (
                  <img
                    class="img-responsive"
                    src={singlePostData?.image}
                    alt=""
                    style={{
                      maxHeight: "250px",
                      objectFit: "cover",
                      width: "100%",
                      objectPosition: "top",
                    }}
                  />
                ) : (
                  <img
                    class="img-responsive"
                    src="http://placehold.it/900x300"
                    alt=""
                    style={{
                      maxHeight: "250px",
                      objectFit: "cover",
                      width: "100%",
                      objectPosition: "top",
                    }}
                  />
                )}
              </Link>
              <hr />
              <h4>Description:</h4>
              <p>{singlePostData.post_content}</p>
              <a class="btn btn-primary" href="#">
                Read More{" "}
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </>
          );
        })
      ) : (
        <h2>No Post Found !</h2>
      )}

      <hr />
    </FrontendLayout>
  );
}

export default CategoryDetail;
