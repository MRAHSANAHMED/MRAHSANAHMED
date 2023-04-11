import "antd/dist/reset.css";
import { QueryClient, QueryClientProvider } from "react-query";
import { BrowserRouter } from "react-router-dom";
import AuthenticatedRoute from "./routes/AuthenticatedRoute";
import UnAuthenticatedRoute from "./routes/UnAuthenticatedRoute";
import { AuthService } from "./services/Auth.service";

const queryClient = new QueryClient({
  defaultOptions: {
    queries: {
      refetchOnWindowFocus: false,
      refetchOnMount: false,
      refetchOnReconnect: false,
      retry: 0,
      staleTime: 5 * 1000,
    },
  },
});
function App() {
  return (
    <>
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
    </>
  );
}

export default App;
