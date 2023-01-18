import React, { useEffect, useState } from 'react'
import Post from '../Components/Posts/Post'
import Spinner from '../Components/Spinner/Spinner';
import { baseUrl } from '../Constant';


function MainApp() {
const [spinner, setSpinner] = useState(false);
const [posts, setPosts] = useState([]);
// const [, set] = useState(null);
useEffect(() => {
  getapi();
}, []);

const getapi = async () => {
    setSpinner(true);

    await fetch(`${baseUrl}`)
    .then((response)=>response.json())
    .then((data)=>setPosts(data))
    .catch((err)=>console.error(err));

    setSpinner(false);
};

  return (
    <div className='container main-app'>
      {spinner && <Spinner/>}
      <Post posts={posts}/>
    </div>
  )
}

export default MainApp
