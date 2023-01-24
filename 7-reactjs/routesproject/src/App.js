import { BrowserRouter, Link, Outlet, Route, Routes } from "react-router-dom";
import LayoutOne from "./Components/LayoutOne/LayoutOne";
import LayoutTwo from "./Components/LayoutTwo/LayoutTwo";
import About from "./Pages/About/About";
import Contact from "./Pages/Contact/Contact";
import Home from "./Pages/Home/Home";
import ProductDetail from "./Pages/ProductDetail/ProductDetail";
import "./App.css";
import NotFound from "./Pages/NotFound/NotFound";

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route element={<LayoutOne />}>
          <Route path="/product/:product_id/:category_id" element={<ProductDetail />} />
        </Route>
        <Route element={<LayoutTwo />}>
          <Route path="/" element={<Home />} />
          <Route path="/about" element={<About />} />
          <Route path="/contact" element={<Contact />} />
        </Route>
      
        <Route path="*" element={<NotFound />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
