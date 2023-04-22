
import "../css/listado.css"
import { Card,CardMedia,CardContent,Typography,CardActions } from "@mui/material";
import { NavLink } from "react-router-dom";
import { ItemDetailContainer } from "./ItemDetailContainer";



export const Item = ({nombre_producto,id,descripcion,precio})=>{
    


    return(
        <>
        <NavLink   style={{textDecoration:"none"}}  to={`/plato/${id}`} >
            <Card  className="cardList" >
                    
                    <img className="imgCard " src="https://a.storyblok.com/f/112937/568x400/a04eeea72a/15_things_to_eat_in_australia-568x400.jpg/m/620x0/filters:quality(70)/" alt="" />
                    <CardContent className="cardContent-flex">
                    <Typography className="pCard" gutterBottom variant="h5" color="white" component="div">
                    {nombre_producto}
                    </Typography>
                    {/* <Typography variant="body2" color="white">
                        {descripcion}
                    </Typography> */}
                    
                        <CardActions className="priceCard">
                            <Typography className="pCard " variant="body2" color="white">
                                {precio}
                            </Typography>
                        </CardActions>
                    
                    </CardContent>
            </Card>
            </NavLink> 
        </>
    )
}