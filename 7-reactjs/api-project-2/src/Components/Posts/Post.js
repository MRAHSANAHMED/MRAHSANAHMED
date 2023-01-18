import React from "react";

function Post(props) {
  const { posts = [] } = props;
  console.log(props);
  return (
    <table className="table table-striped table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>TITLE</th>
          <th>BODY</th>
          <th>EDIT</th>
          <th>DELETE</th>
        </tr>
      </thead>
      <tbody>
        
        {props.length > 0 &&
          posts.map((Post1, index) => {
            return (
              <tr key={index}>
                <td>{Post1.id}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <button className="btn btn-primary" type="submit">
                    EDIT
                  </button>
                </td>
                <td>
                  <button className="btn btn-danger" type="submit">
                    DELETE
                  </button>
                </td>
              </tr>
            );
          })}
      </tbody>
    </table>
  );
}

export default Post;
