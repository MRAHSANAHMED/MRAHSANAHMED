import React from "react";

function TaskList(props) {
  const {} = props;
  return (
    <div className="card-action">
      <h5 id="task-title">Tasks</h5>
      <div className="input-field col s12">
        <input type="text" name="filter" id="filter" />
        <label>Filter Task</label>
      </div>
      <ul className="collection">
        <li className="collection-item" style={{display:"flex"}}>
          name
          
            <div style={{marginLeft:"auto"}}>
            <button>
              <span className="material-icons">edit</span>
            </button>

            <button>
            <span class="material-icons">delete</span>
            </button>
            </div>
          
        </li>
      </ul>
      <a href="/" className="clear-tasks btn black">
        Clear Task
      </a>
    </div>
  );
}

export default TaskList;
