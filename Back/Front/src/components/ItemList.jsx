import axios from "axios"
import { useEffect, useState } from "react"
import Card from '@mui/material/Card';
import CardActions from '@mui/material/CardActions';
import CardContent from '@mui/material/CardContent';
import CardMedia from '@mui/material/CardMedia';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import { Container, display, maxWidth } from "@mui/system";
import  {NavLink}   from "react-router-dom"
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
        },[]);
        
        
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