/* eslint-disable jsx-a11y/anchor-is-valid */
import React, { useMemo } from "react";
import "../../assets/frontend/css/bootstrap.min.css";
import "../../assets/frontend/css/blog-home.css";
import FrontendHeader from "../../FrontendComponents/FrontendHeader/FrontendHeader";
import FrontendSidebar from "../../FrontendComponents/FrontendSidebar/FrontendSidebar";
import FrontendFooter from "../../FrontendComponents/FrontendFooter/FrontendFooter";
import { useQuery } from "react-query";
import { PostService } from "../../services/posts.service";
import { globalReactQueryOptions } from "../../utilities/util.constant";
import CustomLoader from "../../Container/CustomLoader/CustomLoader";
import { UtilService } from "../../utilities/util.service";
import { CategoryService } from "../../services/categories.service";

function Home() {
  const { data: posts, isLoading: postLoading } = useQuery(
    ["posts"],
    PostService.getPosts,
    {
      ...globalReactQueryOptions,
    }
  );
  const postData = useMemo(() => posts?.data?.results, [posts?.data?.results]);

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

  if (postLoading || categoryLoader) {
    return <CustomLoader />;
  }

  return (
    <div>
      <FrontendHeader categoriesData={categoriesData} />
      <div className="container">
        <div className="row">
          <div className="col-md-8">
            <h1 className="page-header">All Posts</h1>

            {postData.map((singlePostData) => {
              return (
                <>
                  <h2>
                    <a href="#">{singlePostData?.post_title}</a>
                  </h2>
                  <p className="lead">
                    by <a href="index.php">{singlePostData?.post_author}</a>
                  </p>
                  <p>
                    <span className="glyphicon glyphicon-time"></span> Posted on
                    &nbsp;
                    {UtilService.convertDateToOurFormat(
                      singlePostData?.post_date
                    )}
                  </p>
                  <hr />
                  {singlePostData?.image ? (
                    <img
                      className="img-responsive"
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
                      className="img-responsive"
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
                  <hr />
                  <h4>Description:</h4>
                  <p>{singlePostData.post_content}</p>
                  <a className="btn btn-primary" href="#">
                    Read More{" "}
                    <span className="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </>
              );
            })}

            <hr />
          </div>

          <FrontendSidebar categoriesData={categoriesData} />
        </div>

        <FrontendFooter />
      </div>

      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
    </div>
  );
}
export default Home;
