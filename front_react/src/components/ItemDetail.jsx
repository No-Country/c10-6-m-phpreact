import { Container } from "@mui/system"
import { useEffect } from "react";

import { useState } from "react";
import { useSelector,useDispatch } from "react-redux";
import { addToOrder } from "../redux/reducers/order/orderSlice";
import { ItemCount } from "./ItemCount";
import "../css/detail.css"
import { NavLink } from "react-router-dom";
import flecha from "../assets/Flecha.png"


export const ItemDetail = ({nombre_producto,id,descripcion,precio})=>{

    
        const dispatch = useDispatch();
        const {productList,totalCount} = useSelector(state=>state.order)
        const [textAreaValue, setTextAreaValue] = useState("");

        const handleTextArea = (e)=>{
            setTextAreaValue(e.target.value)
        }

        const handleCounter = (e)=>{
            dispatch(addToOrder({nombre_producto,descripcion,precio,id, cantidad:e,notas:textAreaValue}))
        }

        console.log(nombre_producto)
  
        
        return(
            <>  
                <Container className="detail-box"  maxWidth="md">
                    <div className="redDiv"><NavLink to={"/"}> <img className="arrow-back" src={flecha} alt="imagen-flecha" /></NavLink></div>
                    <img className="detail_img" src="https://elsol-compress-release.s3-accelerate.amazonaws.com/images/large/1614296501390milanesa%20con%20huevos.jpg" alt="" />      
                    <h1 style={{color:"white"}}>{nombre_producto} </h1>
                    <span style={{color:"white"}}>{descripcion}</span>
                    <textarea value={textAreaValue}  onChange={handleTextArea} name="" id="" cols="30" rows="10"></textarea>
                    <ItemCount onAdd={(cantidad)=>{handleCounter(cantidad)}}></ItemCount>
                    
                </Container>           
            </>
        )
}