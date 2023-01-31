import { QueryClient, QueryClientProvider } from "react-query";

import {ReactQueryDevtools } from "react-query/devtools";
import "./App.css";
import MainApp from "./Pages/MainApp/MainApp";

const queryClient = new QueryClient({
  defaultOptions: {
    queries: {
      staleTime: 5 * 60 * 1000,
      refetchOnMount: false,
      refetchOnReconnect: false,
      refetchOnWindowFocus: false,
      retry: false,
    },
  },
});
function App() {
  return (
    <QueryClientProvider client={queryClient}>
      <MainApp />
      <ReactQueryDevtools initialIsOpen = {false}/>
    </QueryClientProvider>
  );
}

export default App;
