import React, { memo } from "react";

function Posts(props) {
  const { posts = [], deletePostHandler, updatePostHandler } = props;
  return (
    <table className="table table-hover">
      <thead>
        <tr>
          <th>Post Id</th>
          <th>Title</th>
          <th>Body</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        {posts.length > 0 &&
          posts.map((post, index) => {
            return (
              <tr>
                <td>{post.id}</td>
                <td>{post.title}</td>
                <td>{post.body}</td>
                <td>
                  <button
                    className="btn btn-primary"
                    onClick={(event) => updatePostHandler(event, post.id)}
                  >
                    Edit
                  </button>
                </td>
                <td>
                  <button
                    className="btn btn-danger"
                    onClick={(event) => deletePostHandler(event, post.id)}
                  >
                    Delete
                  </button>
                </td>
              </tr>
            );
          })}
      </tbody>
    </table>
  );
}

export default memo(Posts);
