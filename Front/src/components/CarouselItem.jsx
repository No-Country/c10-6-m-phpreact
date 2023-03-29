
import { Paper,Button } from "@mui/material";





export const CarouselItem = ({name,description,image})=>{

    return (
        <Paper>
            <h2>{name}</h2>
            <p>{description}</p>
            <img src={image} alt="foodimage" style={{width:"100%",height:"50vh",objectFit:"cover"}}/>

            <Button className="CheckButton">
                Check it out!
            </Button>
        </Paper>
    )
}