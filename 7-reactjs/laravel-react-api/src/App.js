import "antd/dist/reset.css";
import { QueryClient, QueryClientProvider } from "react-query";
import { BrowserRouter } from "react-router-dom";
import AuthenticatedRoute from "./routes/AuthenticatedRoute";
import UnAuthenticatedRoute from "./routes/UnAuthenticatedRoute";
import { AuthService } from "./services/Auth.service";

// creating client

const queryClient = new QueryClient();
function App() {
  return (
    <QueryClientProvider client={queryClient}>
      <div className="App">
        <BrowserRouter>
          {AuthService.isUserIsLogin() ? (
            <AuthenticatedRoute />
          ) : (
            <UnAuthenticatedRoute />
          )}
        </BrowserRouter>
      </div>
    </QueryClientProvider>
  );
}

export default App;
