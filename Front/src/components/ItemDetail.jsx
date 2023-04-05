import { Container } from "@mui/system"
import { Card,CardMedia,CardContent,Typography,CardActions } from "@mui/material";
import { useState } from "react";
import { useSelector,useDispatch } from "react-redux";
import { addToOrder } from "../redux/reducers/order/orderSlice";




export const ItemDetail = ({nombre,id,descripcion,precio})=>{

        const [plato,setPlato] = useState({})  //no se para que carajo lo cree el estado ?¿

        const dispatch = useDispatch();
        const {productList} = useSelector(state=>state.order)
        

        const handleSubmit= (object)=>{
            dispatch(addToOrder(object))
        }





        return(
            <>  
                <Container>
                    <br></br>
                    <br></br>
                    <br></br>
                    <h1>{nombre} </h1>
                    <h2>{descripcion}</h2>
                    <ul>
                        <li>ingrediente</li>
                        <li>ingrediente</li>
                        <li>{precio}</li>
                    </ul>
                    <button onClick={()=>{handleSubmit({nombre,descripcion,precio,id})}} >agregar pedido</button>
                </Container>           
            </>
        )
}