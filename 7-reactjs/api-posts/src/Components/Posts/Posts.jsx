import React from "react";

function Posts(props) {
  const { posts = [],deletePostHandler } = props;
  return (
    <table className="table table-hover">
      <thead>
        <tr>
          <th>Post Id</th>
          <th>Title</th>
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
                <td>
                  <button className="btn btn-primary">Edit</button>
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

export default Posts;
