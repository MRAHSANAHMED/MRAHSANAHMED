const taskForm = document.querySelector("#task-form");
const taskInput = document.querySelector("#task");
const collection = document.querySelector(".collection");

taskForm.addEventListener("submit", taskFormFunction);

function taskFormFunction(event) {
  event.preventDefault(); // default functionality rukdo
  if (taskInput.value == "") {
    alert("task input field is required");
    return;
  }
  const taskValue = taskInput.value;

  const li = document.createElement("li");
  li.className = "collection-item";
  // <li class="collection-item"></li>

  li.innerText = taskValue;
  // <li class="collection-item">taskValue</li>
  const link = document.createElement("a");
  link.className = "delete-item secondary-content";
  //<a class="delete-item secondary-content"></a>

  const icon = document.createElement("i");
  icon.className = "fa fa-remove";
  //<i class="fa fa-remove"></i>

  link.append(icon);
  /* 
  <a class="delete-item secondary-content">
    <i class="fa fa-remove"></i>
  </a>; */

  li.append(link);
  /*<li class="collection-item">
  taskValue 
    <a class="delete-item secondary-content">
        <i class="fa fa-remove"></i>
    </a>
  </li> */
  collection.append(li);
  /* 
  <ul class="collection">
    <li class="collection-item">
    taskValue 
        <a class="delete-item secondary-content">
            <i class="fa fa-remove"></i>
        </a>
    </li>
  </ul>
  */
  taskInput.value = "";

  //   console.log(li, "li");
}
