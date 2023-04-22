import { useSelector,useDispatch } from "react-redux";
import { removeAllfromOrder, removeFromOrder } from "../redux/reducers/order/orderSlice";
import { Card,CardMedia,CardContent,Typography,CardActions, Button, Box } from "@mui/material";
import { NavLink } from "react-router-dom";
import { Container} from "@mui/system";

import { useEffect, useState } from "react";
import { Item } from "./Item";
import "../css/order.css"

import Swal from 'sweetalert2'

export const Order = () => {
    const dispatch = useDispatch();
    const { productList, totalCount } = useSelector(state => state.order);
    const [table,setTable] = useState(null);

    const handleRemove = (id) => {
      dispatch(removeFromOrder(id));
       
    }

    


    let copy = productList.map((plato) => {
      return {
        id: Number(plato.id),
        cantidad: plato.cantidad,
        precio: Number(plato.precio),
        descuento: 0.3,
        obser:plato.notas.length == 0 ? "''" : plato.notas 

      };
    });

    let orderCopy = [{mesa:Number(table)}, ...copy];
   
    const handleSubmit = async (orden)=>{

      if(table !== null){

              const myHeaders = new Headers();
              myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
              const urlencoded = new URLSearchParams();
              urlencoded.append("pedidos",JSON.stringify(orderCopy));

              
              const requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: urlencoded,
                redirect: 'follow'
              };

              fetch("https://rafalopez.000webhostapp.com/api/V1/MESA/PEDIDOS/", requestOptions)
                .then(response => response.text())
                .then(result => {
                  console.log(result)
                  dispatch(removeAllfromOrder())
                })
                .catch(error => console.log('error', error));


      }

      else{

        const { value: number } = await Swal.fire({
          title: 'Input numero de mesa',
          input: 'select',
          inputOptions: {
            'mesas': {
              1: 1,
              2: 2,
              3: 3,
              4: 4
            }
          },
          inputLabel: 'numero de mesa',
          inputPlaceholder: 'ingrese su numero de mesa'
        })
        if (number) {
          setTable(number)
          await Swal.fire(`su numero de mesa es : ${number}`)
        }
      }
    }

    
  
    return (
      <Container className="container-order">
        <Box className="child-Container-order">
        <h1 className="title-order">Mi Pedido</h1>
        {table !== null && (<h1> tu numero de mesa es : {table}</h1>)}
        <br />
        <br />
        <br />
        <br />
        <h1>{totalCount}</h1>
                {productList.length < 1 ? (
                  <>
                    <h1> no hay nada agregado al pedido! </h1>
                  </>
                ) : (
                  <div>
                  { productList.map((platos) => {
                   
                    return (
                      <div key={platos.id}>

                      <div className="oder-card" >

                        <img src="https://elsol-compress-release.s3-accelerate.amazonaws.com/images/large/1614296501390milanesa%20con%20huevos.jpg" alt="-imageNotFound" />

                        <div>
                          <Typography>{platos.nombre_producto}</Typography>
                          <Typography>{platos.cantidad}</Typography>
                        </div>

                        <div style={{display:"flex", flexDirection:"column"}}>
                        <span>${platos.precio}</span>
                        <button onClick={()=>{handleRemove(platos)}}>remove</button>
                        </div>
                       
                      </div>
                      <hr />
                      </div>

                      
                    )

                  })}
                  
                  <button className="btn-pedir" onClick={()=>{handleSubmit(productList)}} ><Typography> confirmar pedido</Typography></button>

                  </div>
                )}


        </Box>
        
      </Container>
    )
  };



