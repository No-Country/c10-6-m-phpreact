import { useSelector,useDispatch } from "react-redux";
import { removeFromOrder } from "../redux/reducers/order/orderSlice";
import { Card,CardMedia,CardContent,Typography,CardActions, Button } from "@mui/material";
import { NavLink } from "react-router-dom";
import { Container } from "@mui/system";
import { useEffect, useState } from "react";



export const Order = ()=>{
    const dispatch = useDispatch();
    const {productList, totalCount} = useSelector(state => state.order); //como guardo el estado ?

    const [orden,setOrden] = useState([])


    useEffect(() => {
        setOrden(productList)
    }, []);


    
    return(
        <Container>
            <br />
            <br />
            <br />
            <br />
            <h1>{totalCount}</h1>
           { productList.length <1 ? (
            <>
           <h1> no hay nada agregado al pedido! </h1>
           
           </>
           ): orden.map((platos)=>{
            return(
            <>
         
            <Card key={platos.id}  sx={{ maxWidth: 345 , margin:"2%",  }}>
               
                    <CardMedia
                    sx={{ height: 140 }}
                    title={platos.nombre}
                    image=""
                    />
                    <CardContent>
                    <Typography gutterBottom variant="h5" component="div">
                    {platos.nombre}
                    </Typography>
                    <Typography gutterBottom variant="h5" component="div">
                    {platos.id}
                    </Typography>
                    <Typography variant="body2" color="text.secondary">
                        {platos.descripcion}
                    </Typography>
                    <Typography variant="body2" color="text.secondary">
                    Precio: {platos.precio}
                    </Typography>
                    </CardContent>
                    <CardActions>
                        <NavLink >editar plato </NavLink> 
                        <Button onClick={()=>{dispatch(removeFromOrder(platos))}}>remover</Button>
                    </CardActions>
            </Card>
            </> 
            )
            
           })}
            
        </Container>
    )
  
};



