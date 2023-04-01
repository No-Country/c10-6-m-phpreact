
import { Card,CardMedia,CardContent,Typography,CardActions } from "@mui/material";
import { NavLink } from "react-router-dom";
import { ItemDetailContainer } from "./ItemDetailContainer";



export const Item = ({nombre,id,descripcion,precio})=>{
    


    return(
        <>
            <Card  sx={{ maxWidth: 345 , margin:"2%",  }}>
                    <CardMedia
                    sx={{ height: 140 }}
                    title={nombre}
                    image=""
                    />
                    <CardContent>
                    <Typography gutterBottom variant="h5" component="div">
                    {nombre}
                    </Typography>
                    <Typography variant="body2" color="text.secondary">
                        {descripcion}
                    </Typography>
                    <Typography variant="body2" color="text.secondary">
                    Precio: {precio}
                    </Typography>
                    </CardContent>
                    <CardActions>
                        <NavLink to={`/plato/${id}`} >ver plato </NavLink> 
                    </CardActions>
            </Card>
        </>
    )
}