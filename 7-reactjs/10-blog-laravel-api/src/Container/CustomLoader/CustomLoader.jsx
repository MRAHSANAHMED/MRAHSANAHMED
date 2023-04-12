import { Spin } from "antd";
import React from "react";

function CustomLoader() {
  return (
    <div className="custom-spinner">
      <Spin size="large" />
    </div>
  );
}

export default CustomLoader;
