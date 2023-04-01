import { Container } from "@mui/system"




export const ItemDetail = ({nombre,id,descripcion,precio})=>{

        return(
            <>  
                <Container>
                <br></br>
                <br></br>
                <br></br>
                <h1>{nombre} </h1>
                <h2>{descripcion}</h2>
                <ul>
                    <li>ingrediente</li>
                    <li>ingrediente</li>
                    <li>{precio}</li>
                </ul>
                <button>agregar pedido</button>
                </Container>           
            </>
        )
}