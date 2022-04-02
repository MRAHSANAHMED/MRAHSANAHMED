const jokeBtn = document.querySelector('.get-jokes');
const inputNumbers = document.getElementById('number');
const form = document.querySelector('form');
const jokesUlElement = document.querySelector(".jokes");

form.addEventListener('submit' ,function(event){
    event.preventDefault();
    const inputValue = inputNumbers.value;
    if(!inputValue){
        alert("INPUT FIELD REQUIRED");
        return;
    } 
    const apiUrl = `https://api.icndb.com/jokes/random/${inputValue}`

    const xhr = new XMLHttpRequest();
    xhr.open('GET',apiUrl,true);
    xhr.onprogress = function(){

    }
    xhr .onerror = function() {
        console.log("Request error....");
    }
    xhr.onload = function(){

        if(xhr.readyState == 4 && this.status == 200){
            const data = JSON.parse(this.responseText);
            let output = '';
            if (data.type == 'success'){
                const jokesItems = data.value;
                jokesItems.forEach(function(singleJoke){
                    output += `<li>${singleJoke.joke}</li>`
                })
            }else{
                output += `<li>something went wrong!</li>`


            }
            jokesUlElement.innerHTML = output;
        }
    }
    xhr.send();
 })

