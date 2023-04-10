import { Container } from "@mui/system"
import { useEffect } from "react";

import { useState } from "react";
import { useSelector,useDispatch } from "react-redux";
import { addToOrder } from "../redux/reducers/order/orderSlice";
import { ItemCount } from "./ItemCount";




export const ItemDetail = ({nombre,id,descripcion,precio})=>{

        const [platosCount,setPlatosCount] = useState()  //no se para que carajo lo cree el estado ?¿
        
        const dispatch = useDispatch();
        const {productList,totalCount} = useSelector(state=>state.order)
        
        const handleCounter = (e)=>{
            dispatch(addToOrder({nombre,descripcion,precio,id, cantidad:e}))
        }


        useEffect(() => {
         setPlatosCount(totalCount)
        }, [totalCount]);
        
        return(
            <>  
                <Container>
                    <br></br>
                    <br></br>
                    <br></br>
                    <h1>{platosCount}</h1>
                    <h1>{nombre} </h1>
                    <h2>{descripcion}</h2>
                    <ul>
                        <li>ingrediente</li>
                        <li>ingrediente</li>
                        <li>{precio}</li>
                    </ul>
                    <ItemCount onAdd={(e)=>{handleCounter(e)}}></ItemCount>
                </Container>           
            </>
        )
}