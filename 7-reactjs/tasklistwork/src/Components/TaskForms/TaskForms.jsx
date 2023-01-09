import React,{useState} from 'react';
import Swal from 'sweetalert2';
import TaskList from '../TaskList/TaskList';

function TaskForm() {
  const [taskField, setTaskField] = useState();


  const taskFieldHandler =(event) =>{
    event.preventDefault();
    setTaskField(event.target.value);
  }

  const formSubmitHandler =(event)=>{
    event.preventDefault();
    if(!taskField){
      Swal.fire({
        icon:"error",
        title:"TAKE TASK",
      });
      return;
    }
    addnewTask();

    setTaskField("");
  }
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
                    Add Task
                  </button>
                </form>
              </div>
            </div>
            {/* TASK LIST */}
            <TaskList
              
            />
          </div>
        </div>
      </div>
    </div>
  )
}

export default TaskForm;