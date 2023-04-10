import { Button } from "@mui/material"
import { useState } from "react"




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
        <>
                <Button onClick={()=>{decrementar()}}>-</Button>              
                    <span>{counter}</span>
                <Button onClick={()=>{incrementar()}}>+</Button>
            {counter >0 && <Button  className="col-md-4 addToCartButton"  onClick={()=>onAdd(counter)} variant="secondary">Agregar a tu pedido</Button> }
        </>
    )
}