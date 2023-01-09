import React, { useState,useEffect } from 'react';
import "./MainApp.css";

function MainApp() {
    const [loader, setLoader] = useState(false);
    const [posts,setPosts] = useState([]);
    useEffect(() => {
      getPosts();
    }, []);
    
    const getPosts = async() =>{
        setLoader(true);
        await fetch(`https://jsonplaceholder.typicode.com/posts`)
            .then ((response)=>response.json())
            .then ((data)=> setPosts(data))
            .catch((err)=>console.error(err));

            setLoader(false);

    };
  return (
    <div className="container main-app">
    <button className="btn btn-primary create-post">Create Post</button>
   {loader &&(
    <div className='container main-app'>
         <div className="spinner"></div>
    </div>
   )}
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
        {posts.length >0 && 
        posts.map((post,index)=>{return(
            <tr>
            <td>{post.id}</td>
            <td>{post.title}</td>
            <td>
              <button className="btn btn-primary">Edit</button>
            </td>
            <td>
              <button className="btn btn-danger">Delete</button>
            </td>
          </tr>
        );
        })}
             
            
      </tbody>
    </table>
  </div>
  )
}

export default MainApp
