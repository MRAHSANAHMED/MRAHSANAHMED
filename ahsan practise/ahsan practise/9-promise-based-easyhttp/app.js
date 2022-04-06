const http = new EasyHttp;

const getBtn = document.querySelector('.get-request'); 
const postBtn = document.querySelector('.post-request'); 
const putBtn = document.querySelector('.put-request'); 
const deleteBtn = document.querySelector('.delete-request'); 


getBtn.addEventListener('click',function(event){
    event.preventDefault();
    http.get('https://jsonplaceholder.typicode.com/posts')
    .then(data => console.log(data))
    .catch(error => console.log(error))
});

postBtn.addEventListener('click',function(event){
    event.preventDefault();
    const payload = {
        userId: 1,
        id: 1,
        title: "this is title",
        body: "this is body"
    };
    http.post('https://jsonplaceholder.typicode.com/posts',payload)
    .then(data => console.log(data))
    .catch(error => console.log(error))
})

putBtn.addEventListener('click',function(event){
    event.preventDefault();
    const payload = {
        userId: 1,
        id: 1,
        title: "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
        body: "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
    };

    http.post('https://jsonplaceholder.typicode.com/posts/1',payload)
    .then(data => console.log(data))
    .catch(error => console.log(error))
})

deleteBtn.addEventListener('click',function(event){
    event.preventDefault();
    http.get('https://jsonplaceholder.typicode.com/posts/1')
    .then(data => console.log(data))
    .catch(error => console.log(error))
})


