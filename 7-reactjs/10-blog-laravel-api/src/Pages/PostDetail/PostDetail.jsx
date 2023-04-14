/* eslint-disable jsx-a11y/no-redundant-roles */
/* eslint-disable jsx-a11y/anchor-is-valid */
import React, { useMemo } from "react";
import { useQuery } from "react-query";
import { Link, useParams } from "react-router-dom";
import CustomLoader from "../../Container/CustomLoader/CustomLoader";
import FrontendLayout from "../../FrontendComponents/FrontendLayout/FrontendLayout";
import { PostService } from "../../services/posts.service";
import {
  globalReactQueryOptions,
  unAuthenticatedRoutes,
} from "../../utilities/util.constant";
import { UtilService } from "../../utilities/util.service";

function PostDetail() {
  const { post_id } = useParams();
  const { data: postByIdDataTemp, isLoading: postByIdLoader } = useQuery(
    ["posts", post_id],
    () => PostService.getPostById(post_id),
    {
      ...globalReactQueryOptions,
      enabled: Boolean(post_id),
    }
  );

  const postByIdData = useMemo(
    () => postByIdDataTemp?.data?.results,
    [postByIdDataTemp?.data?.results]
  );
  if (postByIdLoader) {
    return <CustomLoader />;
  }
  return (
    <FrontendLayout>
      <>
        <h1>{postByIdData?.post_title}</h1>

        {postByIdData?.post_author && (
          <p class="lead">
            by <a href="#">{postByIdData?.post_author}</a>
          </p>
        )}

        {postByIdData?.category?.cat_title && (
          <p class="lead">
            category:{" "}
            <Link
              to={unAuthenticatedRoutes.CATEGORY_DETAIL.replace(
                ":cat_id",
                postByIdData?.category?.cat_id
              )}
            >
              {postByIdData?.category?.cat_title}
            </Link>
          </p>
        )}

        <hr />

        <p>
          <span class="glyphicon glyphicon-time"></span> Posted on &nbsp;
          {UtilService.convertDateToOurFormat(postByIdData?.post_date)}
        </p>
        <hr />
        {postByIdData?.image ? (
          <img class="img-responsive" src={postByIdData?.image} alt="" />
        ) : (
          <img
            class="img-responsive"
            src="http://placehold.it/900x300"
            alt=""
          />
        )}
        <hr />
        <p class="lead">{postByIdData?.post_content}</p>
        <hr />
        <div class="well">
          <h4>Leave a Comment:</h4>
          <form role="form">
            <div class="form-group">
              <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">
              Submit
            </button>
          </form>
        </div>
        <hr />
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="" />
          </a>
          <div class="media-body">
            <h4 class="media-heading">
              Start Bootstrap
              <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
            scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
            in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
            nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="" />
          </a>
          <div class="media-body">
            <h4 class="media-heading">
              Start Bootstrap
              <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
            scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
            in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
            nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <div class="media">
              <a class="pull-left" href="#">
                <img
                  class="media-object"
                  src="http://placehold.it/64x64"
                  alt=""
                />
              </a>
              <div class="media-body">
                <h4 class="media-heading">
                  Nested Start Bootstrap
                  <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                scelerisque ante sollicitudin commodo. Cras purus odio,
                vestibulum in vulputate at, tempus viverra turpis. Fusce
                condimentum nunc ac nisi vulputate fringilla. Donec lacinia
                congue felis in faucibus.
              </div>
            </div>
          </div>
        </div>
      </>
    </FrontendLayout>
  );
}
export default PostDetail;
