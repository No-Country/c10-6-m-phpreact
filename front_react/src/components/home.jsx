import { Container } from "@mui/system"
import { HomeCarousel } from "./HomeCarousel"
import { ItemList } from "./ItemList"
import { Order } from "./Order"
import "../css/home.css"
import { useSelector } from "react-redux"
import { NavBar } from "./NavBar"




export const Home = ()=>{

    const { productList, totalCount } = useSelector(state => state.order);
    
    return(
        <>
        <div className="home">
        <Container>
            
        <HomeCarousel></HomeCarousel>

        <ItemList></ItemList>
        
        </Container>
        </div>
        {productList.length> 0 && <NavBar/>}
        </>
    )


}