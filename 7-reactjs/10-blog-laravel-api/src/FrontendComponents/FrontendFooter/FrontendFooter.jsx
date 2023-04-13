import React from "react";

function FrontendFooter() {
  return (
    <footer>
      <div className="row">
        <div className="col-lg-12">
          <p>Copyright &copy; Blog Website {new Date().getFullYear()}</p>
        </div>
      </div>
    </footer>
  );
}

export default FrontendFooter;
