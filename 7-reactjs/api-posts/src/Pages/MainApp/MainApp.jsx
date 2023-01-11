import React, { useState,useEffect } from 'react';
import Swal from 'sweetalert2';
import Posts from '../../Components/Posts/Posts';
import Spinner from '../../Components/Spinner/Spinner';
import { baseUrl } from '../../constant';
import "./MainApp.css";

function MainApp() {
    const [loader, setLoader] = useState(false);
    const [posts,setPosts] = useState([]);
    useEffect(() => {
      getPosts();
    }, []);
    
    const getPosts = async() =>{
        setLoader(true);
        await fetch(`${baseUrl}/posts`)
            .then ((response)=>response.json())
            .then ((data)=> setPosts(data))
            .catch((err)=>console.error(err));

            setLoader(false);

    };

    const confirmationModal = async () =>{
      const response = await Swal.fire({
        title:"SURE DELETE IT?",
        showDenyButton:"Yes",
        confirmButtonText:"No",
      }).then((result) => {

        if(result.isConfirmed){
          return true;
        }else if (result.isDenied){
          return false;
        }
      });
      return response;
    }

    const deletePostHandler= async (event,postId) =>{
      event.preventDefault();
      const confirmBtnResponse = await confirmationModal();
      if(confirmBtnResponse){
        setLoader(true);
        await fetch (`${baseUrl}/post/${postId}` , {
          method: "DELETE",
        }).then(async () => {
          await getPosts();
        }).catch ((error) => console.log(error));
        setLoader(false);
        Swal.fire("deleted","","success");
      }else{
        Swal.fire("not delete","","info");
      }
    };
  return (
    <div className="container main-app">
    <button className="btn btn-primary create-post">Create Post</button>
   {loader && <Spinner
   />}

   <Posts 
   posts={posts}
   deletePostHandler={deletePostHandler}
   />.
  </div>
  )
}

export default MainApp;
