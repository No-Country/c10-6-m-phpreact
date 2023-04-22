
import { Paper,Button } from "@mui/material";
import "../css/carousel.css"




export const CarouselItem = ({name,description,image})=>{

    return (
        <Paper>
            <img src={image} alt="foodimage" className="carouselImage"/>
            <Button  className="carouselButton " >
                Check it out!
            </Button>
        </Paper>
    )
}