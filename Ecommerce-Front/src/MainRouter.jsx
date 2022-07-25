import React from "react";
import About from "./Pages/About";
import Home from "./Pages/Home";
import Cart from "./Pages/Cart";
import { Routes, Route } from "react-router-dom";

const MainRouter = () => {
  return(
    <Routes>
      <Route path='/' exact element={<Home />} />
      <Route path='/about' exact element={<About />} />
      <Route path='/cart' exact element={<Cart />} />


    </Routes>
  );
}

export default MainRouter;
