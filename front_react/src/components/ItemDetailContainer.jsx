import { Box, Container } from "@mui/material"
import axios from "axios"
import { useEffect, useState } from "react"
import { useParams } from "react-router"
import { ItemDetail } from "./ItemDetail"
import "../css/detail.css"
import { NavBar } from "./NavBar"
import { useSelector } from "react-redux"

export const ItemDetailContainer = ()=>{
    const { productList, totalCount } = useSelector(state => state.order);
    const [plato, setPlato] = useState()

    const {id} = useParams()

    const getPlato = async ()=>{


        try {

            axios.get("https://rafalopez.000webhostapp.com/api/V1/MESA/PRODUCTOS")

            .then(res=>{
                const data = res.data 
            let platoFiltrado=data.find(e=>e.id==id)
            console.log(platoFiltrado)
                setPlato(platoFiltrado)           
            }
            ).catch(error =>{
                console.log(error.message)
            })
            
        } catch (error) {
            console.log(error.message)
        }

    }

    
    useEffect(() => {
       getPlato()
    }, []);

    
    
    return (
        <Box className="containerDetail" >
        <ItemDetail {...plato}></ItemDetail>
        {productList.length> 0 && <NavBar/>}
      
        </Box>
    )
}