import React, { memo, useEffect, useState } from "react";
import { useMutation, useQueryClient } from "react-query";
import Swal from "sweetalert2";
import { PostQueries } from "../../queries/PostQueries";
import Spinner from "../Spinner/Spinner";

function EditPost({editPostData ,setEditPostId  }) {
  const [title, setTitle] = useState("");
  const [body, setBody] = useState("");

  const queryClient = useQueryClient();

  const { mutateAsync: updatePostByIdMutate ,isLoader:loader} =
    useMutation(PostQueries.updatePostById);
  useEffect(() => {
    if (editPostData) {
      const { body, title } = editPostData;
      setBody(body);
      setTitle(title);
    }
  }, [editPostData]);

  const updatePostSubmit = async (event) => {
    event.preventDefault();
    console.log(updatePostSubmit, "updatePostSubmit");

    if (!title || !body) {
      Swal.fire("fill values", "", "warning");
      return;
    }
    // const formPayload = {title:title,body:body};

    const formPayLoad = { title, body };
    setEditPostId(null);
    updatePostByIdMutate(
      {
        postId: editPostData.id,
        formBody: formPayLoad,
      },
      {
        onSuccess: () => {
          setTitle("");
          setBody("");
          let $ = window.$;
          $("#updatePost").modal("hide");
          queryClient.invalidateQueries(["posts"]);
        },
      }
    );
  };
  return (
    <React.Fragment>
      {loader && <Spinner />}
      
      <div
        className="modal fade"
        id="updatePost"
        tabIndex="-1"
        role="dialog"
        aria-labelledby="modalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog" role="document">
          <div className="modal-content">
            <div className="modal-header">
              <button
                type="button"
                className="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
              <h2 className="modal-title" id="modalLabel">
                Update Post
              </h2>
            </div>
            <div className="modal-body">
              <form
                method="POST"
                id="create-post-form"
                onSubmit={updatePostSubmit}
              >
                <div className="form-group">
                  <label>
                    <h4>Title</h4>
                  </label>
                  <input
                    type="text"
                    className="form-control"
                    id="post_title"
                    placeholder="Title"
                    onChange={(event) => setTitle(event.target.value)}
                    value={title}
                  />
                </div>

                <div className="form-group">
                  <label>
                    <h4>Body</h4>
                  </label>
                  <textarea
                    name=""
                    id="post_body"
                    cols="30"
                    rows="10"
                    placeholder="Body"
                    className="form-control"
                    onChange={(event) => setBody(event.target.value)}
                    value={body}
                  ></textarea>
                </div>

                <button
                  type="submit"
                  className="btn btn-primary"
                  disabled={loader}
                >
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </React.Fragment>
  );
}

export default memo(EditPost);
