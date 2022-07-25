import React from 'react';
import { BrowserRouter } from 'react-router-dom';
import MainRouter from './MainRouter';
import { CartContextProvider } from './Pages/context/CartContext';

export default function App() {
  return (
    <CartContextProvider>
      <BrowserRouter>
        <MainRouter />
      </BrowserRouter>
    </CartContextProvider>
  );
};
