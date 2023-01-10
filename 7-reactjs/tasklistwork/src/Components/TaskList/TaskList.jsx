import React from "react";

function TaskList(props) {
  const { task, editTaskHandler ,deleteTaskHandler } = props;
  return (
    <div className="card-action">
      <h5 id="task-title">Tasks</h5>
      <div className="input-field col s12">
        <input type="text" name="filter" id="filter" />
        <label>Filter Task</label>
      </div>
      <ul className="collection">
        {task.length > 0 ? (
          task.map((singleTask, index) => {
            return (
              <li key={index} className="collection-item" style={{ display: "flex" }}>
                {singleTask}

                <div style={{ marginLeft: "auto" }}>
                  <a href="/" onClick={(event)=>editTaskHandler(event,index)}>
                    <span className="material-icons" >edit</span>
                  </a>

                  <a href="/" onClick={(event)=>deleteTaskHandler(event,index)}>
                    <span class="material-icons">delete</span>
                  </a>
                </div>
              </li>
            );
          })
        ) : (
          <p className="collection-item">no task</p>
        )}
      </ul>
      <a href="/" className="clear-tasks btn black">
        Clear Task
      </a>
    </div>
  );
}

export default TaskList;
