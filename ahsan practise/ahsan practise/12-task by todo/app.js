const form = document.querySelector("form");
const input = document.querySelector("input");
// const submitBtn = document.querySelector("submit");
const list = document.querySelector("ul");

form.addEventListener("submit",function(e){
    e.preventDefault();
    toDo();
    input.value = "";
})
function toDo() {
    if (input.value === '') {
        alert ('enter task');
    }
    else {
        const value = input.value;
        //creating li element each time we submit
        const newList = document.createElement("li");
        // adding the value of the input in the li
        newList.textContent = value;
        //adding the delete button
        const deleteBtn = document.createElement("button");
        //changing the content of the button
        deleteBtn.textContent = "Delete";
        // adding the li inside the ul
        list.append(newList);
        newList.append('',deleteBtn);
        

    }
}

list.addEventListener('click',function(e) {
    e.preventDefault();
    if(e.target.nodeName === 'BUTTON') {
        e.target.closest('LI').remove();
    }
})
  