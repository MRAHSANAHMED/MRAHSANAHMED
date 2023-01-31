import React, { useState } from "react";
import Swal from "sweetalert2";
import Posts from "../../Components/Posts/Posts";
import Spinner from "../../Components/Spinner/Spinner";
import "./MainApp.css";
import { useQuery,useMutation, useQueryClient } from "react-query";
import { PostQueries } from "../../queries/PostQueries";
import CreatePost from "../../Components/CreatePost/CreatePost";
import EditPost from "../../Components/EditPost/EditPost";

function MainApp() {
  // const [loader, setLoader] = useState(false);
  // const [posts, setPosts] = useState([]);
  const queryClient = useQueryClient();
  
  const {data: posts, isLoader:postLoader} = useQuery(
    ["posts"],
    PostQueries.fetchPosts
  );

  const {mutateAsync: deletePostMutate, isLoader:deletePostLoader} =
  useMutation(PostQueries.deletePost);
  
  
  const [editPostId, setEditPostId] = useState(null);
  
  const {data:editPostData} = useQuery(
    ["posts",editPostId],
    ()=> PostQueries.getPostId(editPostId),
    {
      staleTime:0,
      enabled:Boolean(editPostId),
      onSuccess: () =>{
        let $ =  window.$;
        $("#updatePost").modal('show');
      },
    }
    );
    
    const updatePostHandler =async (event, postId) => {
      event.preventDefault();
      setEditPostId(postId);
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
       deletePostMutate(postId,{
        onSuccess: () => {
          queryClient.invalidateQueries(["posts"]);
        },
       });
      Swal.fire("deleted", "", "success");
    } else {
      Swal.fire("not deleted", "", "info");
    }
  };

  return (
    <div className="container main-app">
      {(postLoader || deletePostLoader ) && <Spinner />}
      <CreatePost />
      <EditPost  editPostData={editPostData} setEditPostId={setEditPostId} />
      <Posts
        posts={posts}
        deletePostHandler={deletePostHandler}
        updatePostHandler={updatePostHandler}
      />
      
    </div>
  );
}

export default MainApp;
