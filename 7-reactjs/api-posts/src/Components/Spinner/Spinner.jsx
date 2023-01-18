import React, { memo } from 'react';
import "./Spinner.css";

function Spinner() {
  return (
    <div className='container main-app loader-container'>
    <div className="spinner"></div>
</div>
  )
}

export default memo(Spinner)