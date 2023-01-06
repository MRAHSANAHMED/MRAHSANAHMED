import React from 'react';
import TaskList from '../TaskList/TaskList';

function TaskForm() {
  return (
    <div className="container">
      <div className="row">
        <div className="col s12">
          <div className="card">
            <div className="card-content">
              <span className="card-title">Task List</span>
              <div className="row">
                <form id="task-form" onSubmit={''}>
                  <div className="input-field col s12">
                    <input
                      type="text"
                      name="task"
                      id="task"
                      onChange={''}
                      value={''}
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