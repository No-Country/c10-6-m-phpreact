import axios from "axios"
import { useEffect, useState } from "react"
import { Container, display, maxWidth } from "@mui/system";
import { Item } from "./Item";


export const ItemList = ()=>{


    const [menu , setMenu]= useState([])

    
        useEffect(() => {
            try {
                axios.get("http://localhost:3000/platos")
            .then(res=>{
                const data = res.data ;
                setMenu(data)
                
            }
            ).catch(error =>{
                console.log(error.message)
            })
                
            } catch (error) {
                console.log(error.message)
            }
        },[]); //se podria hacer un dispacht aca ? abro hilo



        
        
    return(
        <>
        <Container sx={{display:"flex", justifyContent:"center" , pt:"10%",flexWrap:"wrap"}}  maxWidth="xl">
            {menu.length > 0 ? menu.map((item)=>{
                return(
                    
                    <Item key={item.id} {...item}></Item>
                )
            } ) : <h1>Loading...</h1>}
        </Container>
        </>
    );

}