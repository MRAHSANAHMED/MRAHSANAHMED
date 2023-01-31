import { baseUrl } from "../constant";

const fetchPosts = async ()=>{
    const response = await fetch(`${baseUrl}/posts`);
    return response.json();
};
const deletePost = async (postId) => {
   const response = await fetch(`${baseUrl}/post/${postId}`, {
        method: "DELETE",
      });
      return response.json();
};
const createPost = async(formPayload) =>{
    const response = await fetch(`${baseUrl}/posts`,{
        method:"POST",
        headers:{
            "Content-Type": "application/json",
        },
        body:JSON.stringify(formPayload),
    });
    return response.json();
}



const getPostId = async (postId) => {
    const response = await fetch(`${baseUrl}/posts/${postId}`);
    return response.json();
};
const updatePostById = async ({postId,formBody}) =>{
    const response = await fetch(`${baseUrl}/posts/${postId}`,{
        method:"PUT",
        headers:{
            "Content-Type":"application.json",
        },
        body:JSON.stringify(formBody),
    }
    );
    return response.json();
};
  
export const PostQueries = {
    fetchPosts,
    deletePost,
    createPost,
    getPostId,
    updatePostById,
}