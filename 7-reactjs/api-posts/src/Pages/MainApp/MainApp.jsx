import React, { useState, useEffect } from "react";
import Swal from "sweetalert2";
import Posts from "../../Components/Posts/Posts";
import CreatePost from "../../Components/CreatePost/CreatePost";
import EditPost from "../../Components/EditPost/EditPost";
import Spinner from "../../Components/Spinner/Spinner";
import { baseUrl } from "../../constant";
import "./MainApp.css";

function MainApp() {
  const [loader, setLoader] = useState(false);
  const [posts, setPosts] = useState([]);
  const [editPostData, setEditPostData] = useState(null);
  useEffect(() => {
    getPosts();
  }, []);

  const getPosts = async () => {
    setLoader(true);
    await fetch(`${baseUrl}/posts`)
      .then((response) => response.json())
      .then((data) => setPosts(data))
      .catch((err) => console.error(err));

    setLoader(false);
  };

  const confirmationModal = async () => {
    const response = await Swal.fire({
      title: "SURE DELETE IT?",
      showDenyButton: "Yes",
      confirmButtonText: "No",
    }).then((result) => {
      if (result.isConfirmed) {
        return true;
      } else if (result.isDenied) {
        return false;
      }
    });
    return response;
  };

  const deletePostHandler = async (event, postId) => {
    event.preventDefault();
    const confirmBtnResponse = await confirmationModal();
    if (confirmBtnResponse) {
      setLoader(true);
      await fetch(`${baseUrl}/post/${postId}`, {
        method: "DELETE",
      })
        .then(async () => {
          await getPosts();
        })
        .catch((error) => console.log(error));
      setLoader(false);
      Swal.fire("deleted", "", "success");
    } else {
      Swal.fire("not delete", "", "info");
    }
  };

  const updatePostHandler = async (event, postId) => {
    event.preventDefault();
    setLoader(true);
    await fetch(`${baseUrl}/posts/${postId}`)
      .then((response) => response.json())
      .then((data) => {
        setEditPostData(data);

        let $ = window.$;
        $("#updatePost").modal("show");
      });
  };
  return (
    <div className="container main-app">
      {loader && <Spinner />}
      <CreatePost getPosts={getPosts} />
      <EditPost getPosts={getPosts} editPostData={editPostData} />
      <Posts
        posts={posts}
        deletePostHandler={deletePostHandler}
        updatePostHandler={updatePostHandler}
      />
      
    </div>
  );
}

export default MainApp;
