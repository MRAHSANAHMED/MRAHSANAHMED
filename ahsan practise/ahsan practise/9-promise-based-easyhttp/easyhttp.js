class EasyHttp{
    get(url){
        return new Promise(function(resolve,reject){
            fetch(url)
            .then (res => {
                return res.json();
            })
            .then(data => {
                resolve(data);
            })
            .catch(error => {
                reject(error)
            })
        })
    }
    post(url,data){
        return new Promise(function(resolve,reject){
            fetch(url,{
                headers:{
                    'Content-type' : 'application/json'
                },
                method:"POST",
                body:JSON.stringify(data)
            })
            .then(res => {
                return res.json();
            })
            .then(data => {
                resolve(data);
            })
            .catch(error => {
                reject(error)
            })
        })
    }
    put(url,data){
        return new Promise(function(resolve,reject){
            fetch(url,{
                headers:{
                    'Content-type' : 'application/json'
                },
                method:"PUT",
                body:JSON.stringify(data)
            })
            .then(res => {
                return res,json();
            })
            .then(data => {
                resolve(data);
            })
            .catch(error => {
                reject(error)
            })
        })
    }
    delete(url){
        return new Promise(function(resolve,reject){
            fetch(url,{
                method:"DELETE"
            })
            .then (res => {
                return res.json();
            })
            .then(data => {
                resolve(data);
            })
            .catch(error => {
                reject(error)
            })
        })
    }
}