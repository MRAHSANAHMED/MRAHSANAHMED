import React from "react";

function TaskList(props) {
  const { task } = props;
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
              <li className="collection-item" key={index} style={{ display: "flex" }}>
                {singleTask}

                <div style={{ marginLeft: "auto" }}>
                  <button>
                    <span className="material-icons">edit</span>
                  </button>

                  <button>
                    <span class="material-icons">delete</span>
                  </button>
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
