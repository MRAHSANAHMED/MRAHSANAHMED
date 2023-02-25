// import Login from "./Container/Login/Login";
import "antd/dist/reset.css";
import Register from "./Container/Register/Register";
import { BrowserRouter } from "react-router-dom";
import AuthenticatedRoute from "./routes/AuthenticatedRoute";
import UnAuthenticatedRoute from "./routes/UnAuthenticatedRoute";
import { APP_TOKEN_NAME } from "./utilities/util.constant";

function App() {
  const isAuth = localStorage.getItem(APP_TOKEN_NAME);

  console.log("isAuth", isAuth);

  //   return (
  //     <div className="App">
  //       {/* <Login /> */}
  //       {/* <Register /> */}
  //       <BrowserRouter>
  //         {isAuth ? <AuthenticatedRoute /> : <UnAuthenticatedRoute />}
  //       </BrowserRouter>
  //     </div>
  //   );
  // }
  return (
    <div className="App">
      <BrowserRouter>
        {/* <AuthenticatedRoute /> */}
        <UnAuthenticatedRoute />
      </BrowserRouter>
    </div>
  );
}

export default App;
