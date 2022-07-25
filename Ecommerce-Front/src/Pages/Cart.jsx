import React, {  useContext } from 'react'
import Master from './Layout/Master'
import CartContext from './context/CartContext';

export default function Card() {
  const cart = useContext(CartContext);
  return (
    <Master>
      <div className="container">
        <h1>Card List</h1>
        <table className="table table-striped">
          <thead className='thead-dark'>
            <tr>
              <th scope='col'>Image</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
          { cart.cart.map( (d) => {
            return(
              <tr>
                <td><img src={`http://localhost:8000/images/${d.image}`} width="100" className='img-thumbnail' alt="" /></td>
                <td>{d.name}</td>
                <td>{d.price}</td>
              </tr>
            );
          })}
          <tr>
            <th className='text-end' scope='row' colSpan={2}>Total:</th>
          </tr>
          </tbody>
        </table>
      </div>
      <button className="btn btn-danger">order now</button>
    </Master>
  )
}
