import "antd/dist/reset.css";
import { BrowserRouter } from "react-router-dom";
import AuthenticatedRoute from "./routes/AuthenticatedRoute";
import UnAuthenticatedRoute from "./routes/UnAuthenticatedRoute";
import { AuthService } from "./services/Auth.service";
function App() {
  return (
    <div className="App">
      <BrowserRouter>
        {AuthService.isUserIsLogin() ? (
          <AuthenticatedRoute />
        ) : (
          <UnAuthenticatedRoute />
        )}
      </BrowserRouter>
    </div>
  );
}

export default App;
