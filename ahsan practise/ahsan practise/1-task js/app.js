const taskForm = document.querySelector("#task-form");
const taskInput = document.querySelector("task");
const collection = document.querySelector(".collection");
const clearTask = document.querySelector(".clear-tasks");
const filterInput = document.querySelector("#filter");

taskForm.addEventListener("submit", taskFormFunction);

function taskFormFunction(event) {
    event.preventDefault();
    if(taskInput.value == "") {
        alert("task input field is required"); // only showing "task input field is required" if text changes nothing change
        return;
    }
}
const taskValue = taskInput.value;

// const li = document.createElement("li");
// li.classname = "collection-item";

// li.innertext = taskValue;
// const link = document.createElement("a");
// link.className = "delete-item secondary-content";

// const icon = document.createElement("i");
// icon.className = "fa fa-remove";

// link.append(icon);

// li.append(link);

// collection.append(li);
// taskInput.value = "";

collection.innerHTML += `<li class="collection-item">${taskValue}<a class="delete-item secondary-content"><i class="fa fa-remove"></i></a></li>`;
  storeTaskInLocalStorage(taskInput.value);
  taskInput.value = "";
  bindAllDeleteBtns();

  clearTask.addEventListener("click", clearTaskHandler);

  function clearTaskHandler(event) {
      event.prevantDefault();
      if (confirm("Are u sure?")) {
          collection.innerHTML = "";

      }
      localStorage.removeItem("tasks");
  }
  filterInput.addEventListener("keyup",filterHandler);
  function filterHandler(event) {
      event.prevantDefault();
      const currentElement = event.target;
      const filterValue = currentElement.value.toLowerCase();
      const collectionItems = document.querySelector(".collection-item");
      if (collectionItems.length > 0) {
          collectionItems.forEach(function(singleItem, index){
              const taskValue = singleItem.innerText.toLowerCase();
              if (taskValue.indexOf(filterValue) == -1) {
                  singleItem.style.display = "none";
              } else{
                  singleItem.style.display = "block"
              }
          });
      }
  }
  function storeTaskInLocalStorage(taskInputValue) {
      let tasks = [];
      if (localStorage.getItem("tasks") == null) {
          tasks =[];
      } else {
      tasks = JSON.parse(localStorage.getItem("tasks"));
    }
    tasks.push(taskInputValue);

    localStorage.setItem("tasks",JSON.stringify(tasks));
    }

    document.addEventListener("DOMContentLoaded", getTaskFromLocalStorage);

    function getTaskFromLocalStorage() {
        let tasks =[];
        if (localStorage.getItem('tasks') == null) {
            tasks = [];
        } else {
            tasks = JSON.parse(localStorage.getItem('tasks'));
        }
    if (taskForm.length > 0) {
        tasks.forEach(function(singleItem,index){
            collection.innerHTML += `<li class="collection-item">${singleItem}<a class="delete-item secondary-content"><i class="fa fa-remove"></i></a></li>`;
        });
    }
    bindAllDeleteBtns();
    }
    function bindAllDeleteBtns() {
        const allLinks = document.querySelector(".delete-item");
        if (allLinks.length > 0) {
            allLinks.forEach(function(singleItem, index){
            singleItem.addEventListener("click",function (event){
                event.prevantDefault();
                const currentElement = event.target;
                if (confirm("Are You sure?")) {
                    const liElement = currentElement.parentElement.parentElement;
                    removeTaskFromLocalStorage(liElement.innerText);
                    liElement.remove()
                    }
                });
            });
        }
    }
    function removeTaskFromLocalStorage(findTaskValue) {
        let tasks = [];
        if (localStorage.getItem("tasks") == null) {
            tasks = [];
        } else {
            tasks = JSON.parse(localStorage.getItem("tasks"));
        }
        if (tasks.length > 0) {
            tasks.forEach(function (singleItem, index) {
                if (singleItem == findTaskValue) {
                    tasks.splice(index,1)
                }

            } );
        }
        localStorage.setItem("tasks",JSON.stringify(tasks));
    }