import axios from "axios"
import { useEffect, useState } from "react"
import { useParams } from "react-router"
import { ItemDetail } from "./ItemDetail"


export const ItemDetailContainer = ()=>{

    const [plato, setPlato] = useState()

    const {id} = useParams()

    const getPlato = async ()=>{
        try {
            axios.get("http://localhost:3000/platos")
        .then(res=>{
            const data = res.data 
           let platoFiltrado=data.find(e=>e.id==id)
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
        <>
        <ItemDetail {...plato}></ItemDetail>
        </>
    )
}