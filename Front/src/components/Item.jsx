
import { Card,CardMedia,CardContent,Typography,CardActions } from "@mui/material";
import { NavLink } from "react-router-dom";


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
                        <NavLink>ver plato </NavLink>
                    </CardActions>
            </Card>
        </>
    )
}