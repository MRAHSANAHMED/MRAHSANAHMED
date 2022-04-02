const http = new EasyHttp();

const getRequestBtn = document.querySelector(".get-request");
const getRequestBtn2 = document.querySelector(".get-request-2");
const postRequestBtn = document.querySelector(".post-request");
const putRequestBtn = document.querySelector(".put-request");
const deleteRequestBtn = document.querySelector(".delete-request");

getRequestBtn.addEventListener('click',function(event){
    event.preventDefault();
    http.get('https://jsonplaceholder.typicode.com/posts',function(data,error){
        console.log(data,'data');
        console.log(error,'error');
    })
});

getRequestBtn2.addEventListener('click',function(event){
    event.preventDefault();
    http.get('https://jsonplaceholder.typicode.com/posts',function(data,error){
        console.log(data,'data');
        console.log(error,'error');
    })
});

postRequestBtn.addEventListener('click',function(event){

    event.preventDefault();
    const payload = {
        userId: 1,
        id: 1,
        title: "this is title",
        body: "this is body"
    };
    http.get('https://jsonplaceholder.typicode.com/posts',payload,function(data,error){
        console.log(data,'data');
        console.log(error,'error');
    })
})

putRequestBtn.addEventListener('click',function(event) {
    event.preventDefault();
    const payload = {
        userId: 1,
        id: 1,
        title: "this is title",
        body: "this is body"
    };
    http.put('https://jsonplaceholder.typicode.com/posts/1',payload,function(data,error){
        console.log(data,'data');
        console.log(error,'error');
    })
})

deleteRequestBtn.addEventListener('click',function(event){
    event.preventDefault();
    http.get('https://jsonplaceholder.typicode.com/posts',function(data,error){
        console.log(data,'data');
        console.log(error,'error');
    })
});
