import React, { useState } from "react";
import Swal from "sweetalert2";
import TaskList from "../TaskList/TaskList";

function TaskForm() {
  const [taskField, setTaskField] = useState();
  const [task, setTask] = useState([]);
  const [taskEdit, setTaskEdit] = useState(null);

  const taskFieldHandler = (event) => {
    event.preventDefault();
    setTaskField(event.target.value);
  };
  const editTaskHandler = (event, index) => {
    event.preventDefault();
    
      Swal.fire({
        icon: "warning",
        title: "UPDATING TASK",
      });
    
    setTaskEdit(index);
    setTaskField(task[index]);

    console.log('taskEdit===', index)
    console.log('task[index]', task[index])
  };

  const formSubmitHandler = (event) => {
    event.preventDefault();
    if (!taskField) {
      Swal.fire({
        icon: "error",
        title: "TAKE TASK",
      });
      return;
    }
    if (taskEdit === null) {
      addnewTask();
    } else {
      editTask();
    }

    setTaskField("");
  };

  const addnewTask = () => {
    setTask([...task, taskField]);
  };

  const editTask = () => {
    if (taskField) {
      Swal.fire({
        icon: "success",
        title: "SUCCESSFULL UPDATED TASK",
      });
  }
      const currIndex = taskEdit;
      const tempTasks = [...task];
      
      tempTasks[currIndex] = taskField;

      setTask(tempTasks);
      setTaskEdit(null);
  };

  const deleteTaskHandler=(event,index)=>{
    event.preventDefault();
    Swal.fire({
      title:"ARE U SURE?",
      showDenyButton:true,
      confirmButtonText:"YES",
      denyButtonText:"NO",
    }).then((result) =>{
      if(result.isConfirmed){
        const tempTasks = [...task];
        tempTasks.splice(index,1);
        setTask(tempTasks);

        Swal.fire('deleted',"","success");
      }else{
        Swal.fire('delete fail',"","warning");
      }
    });
  };
  return (
    <div className="container">
      <div className="row">
        <div className="col s12">
          <div className="card">
            <div className="card-content">
              <span className="card-title">Task List</span>
              <div className="row">
                <form id="task-form" onSubmit={formSubmitHandler}>
                  <div className="input-field col s12">
                    <input
                      type="text"
                      name="task"
                      id="task"
                      onChange={taskFieldHandler}
                      value={taskField}
                    />
                    <label>new task</label>
                  </div>
                  <button
                    className="waves-effect waves-light btn"
                    type="submit"
                  >
                    {taskEdit === null ? "Add" :"Update"} Task
                  </button>
                </form>
              </div>
            </div>
            {/* TASK LIST */}
            <TaskList 
            task={task} 
            editTaskHandler={editTaskHandler} 
            deleteTaskHandler={deleteTaskHandler}
            />
          </div>
        </div>
      </div>
    </div>
  );
}

export default TaskForm;
