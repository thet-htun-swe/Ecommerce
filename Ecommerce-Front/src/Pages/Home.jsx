import React, { useContext } from 'react';
import Master from './Layout/Master';
import Axioss from '../config/Axioss';
import Loader from './Components/Loader';
import CartContext from './context/CartContext';

export default function Home() {
  const [loader, setLoader] = React.useState(true);
  const [data, setData] = React.useState({ data: []});
  const [category, setCategory] = React.useState( [] );
  const [selectedCategory, setSelectedCategory] = React.useState( null );
  const [api, setApi ] = React.useState( "/watch" );
 
  const [currentpage, setCurrentPage] = React.useState( 1 );

  React.useEffect(() => {
    Axioss.get(api).then(res=>{
      setLoader(false);
      setData(res.data.data);
    });

    Axioss.get("/category").then(res=>{
      setLoader(false);
      setCategory(res.data.data);
    });
  }, [api]);

  const renderProductByCategory = (id) => {
    setCurrentPage(1);
    setSelectedCategory(id);
    setApi(`/watch?category_id=` + id);
  }

  const renderNextPage = () => {
    setCurrentPage(currentpage + 1);
    const page = currentpage + 1;
    if( selectedCategory === null ){
      setApi(`/watch?page=${page}`);
    } else {
      setApi(`/watch?category_id=${selectedCategory}&page=${page}`);
    }
  };

  const renderPrevPage = () => {
    setCurrentPage(currentpage-1);
    const page = currentpage - 1;
    if( selectedCategory === null){
      setApi(`/watch?page=${page}`);
    } else {
      setApi(`/watch?category_id=${selectedCategory}&page=${page}`);
    }
  }

  //context
  const cart = useContext(CartContext);

  //addToCart
  const addToCart = (d) => {
    cart.setCart([ ...cart.cart, d ]);
  }

  return (
    <Master>
      {loader ? 
      (<Loader />) : 
      (
      <div className='container'>
        <div className="row">
          <div className="col-md-12">
            <div className="card p-3 bg-info">
              <div>
                { category.map( (c) => (
                  <span 
                  className={ selectedCategory===c.id ? 'btn btn-dark' :  'btn btn-outline-dark' }
                  style={{ marginRight: 2 }} 
                  key={ c.id } 
                  onClick={ () => renderProductByCategory(c.id) }>
                    { c.name }
                  </span>
                ))}                
              </div>
            </div>
          </div>
        </div>
        
        <div className='row mt-3'>
          <div className="col-md-12 p-2">
            <div>
              <button 
              className="btn btn-sm btn-primary"
              disabled={ data.prev_page_url === null ? true : false}
              onClick={ () => renderPrevPage() }
              >
                <span className="fas fa-arrow-left"></span>
              </button>
              <button 
              className="btn btn-sm btn-primary ms-2"
              disabled={ data.next_page_url === null ? true : false}
              onClick={ () => renderNextPage() }
              >
                <span className="fas fa-arrow-right" ></span>
              </button>
            </div>
          </div>
          {data.data.map( (d) => {
            return(
              <div className='col-md-5' key={ d.id }>
                <div className='card'>
                  <img src={`http://localhost:8000/images/${d.image}`} className='card-image' alt="" />
                  <div className='card-body'>
                    <h4 className='text-center'>{ d.name }</h4>
                    <div className="d-flex justify-content-between mt-3">
                      <span className="btn btn-sm btn-outline-warning">{ d.price }ks</span>
                      <span 
                      className="btn btn-sm btn-danger"
                      onClick={ () => addToCart(d) }
                      >
                        Add to card
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    )}
    </Master>
  );
}
