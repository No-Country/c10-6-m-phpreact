import { Button, Typography } from "@mui/material"
import { useState } from "react"
import "../css/counter.css"



export const ItemCount = ({onAdd})=>{

    const [counter , setCounter] = useState(1)


    const incrementar = ()=>{
        if(counter >= 0 ){
           setCounter(counter + 1)     
        }
    }

    const decrementar = ()=>{
        if (counter > 1 ){
            setCounter(counter - 1 )
        }
    }


    return(
        <div  >
            <div className="counter-container">
                <button className="counter-btn" onClick={()=>{decrementar()}}>-</button>              
                <span>{counter}</span>
                <button className="counter-btn" onClick={()=>{incrementar()}}>+</button>
            </div>
           
            {counter > 0 && <button  className=" addToOrderButton"  onClick={()=>onAdd(counter)} variant="secondary"> <Typography className="addToOrderButton-text" >Agregar a tu pedido</Typography> </button> }
        </div>
    )
}