import axios from "axios";
import { useEffect, useState } from "react";
import { Container, Box } from "@mui/material";
import { Item } from "./Item";
import { useParams } from "react-router-dom";
import iconoBebida from "../assets/bebida.png";
import iconoEntrada from "../assets/entrada.png";
import iconoPostre from "../assets/postre.png";
import iconoPrincipal from "../assets/principal.png";
import "../css/listado.css";

export const ItemList = () => {
  const [menu, setMenu] = useState([]);
  const [category, setCategory] = useState("");

  useEffect(() => {
    const fetchData = async () => {
      try {
        const res = await axios.get(
          "https://rafalopez.000webhostapp.com/api/V1/MESA/PRODUCTOS"
        );

        if (category === "") {
          setMenu(res.data);
        } else {
          setMenu(res.data.filter((e) => e.categoria === category));
        }
      } catch (error) {
        console.log(error.message);
      }
    };

    fetchData();
  }, [category]);

  const handleCategoryEvent = (string) => {
    setCategory(string);
  };

  return (
    <Container style={{ overflow: "scroll" }} className="listContainer" maxWidth="md">
      <Box sx={{ display: "flex" }}>
        <div className="buttonCartegoryContainer">
          <button
            onClick={() => {
              handleCategoryEvent("entrada");
            }}
            className="buttonCartegory"
            style={{ backgroundImage: `url(${iconoEntrada})` }}
          ></button>

          <h5 style={{ color: "#ffff", textAlign: "center", margin:"0 auto"  }}>Entrada</h5>
        </div>
        <div className="buttonCartegoryContainer">
          <button
            onClick={() => {
              handleCategoryEvent("principal");
            }}
            className="buttonCartegory"
            style={{ backgroundImage: `url(${iconoPrincipal})` }}
          ></button>
          <h5 style={{ color: "#ffff", textAlign: "center", margin:"0 auto"  }}> Principal</h5>
        </div>
        <div className="buttonCartegoryContainer">
          <button
            onClick={() => {
              handleCategoryEvent("postre");
            }}
            className="buttonCartegory"
            style={{ backgroundImage: `url(${iconoPostre})` }}
          ></button>
          <h5 style={{ color: "#ffff", textAlign: "center", margin:"0 auto"  }}>Postre</h5>
        </div>
        <div className="buttonCartegoryContainer">
          <button
            onClick={() => {
              handleCategoryEvent("bebida");
            }}
            className="buttonCartegory"
            style={{ backgroundImage: `url(${iconoBebida})` }}
          ></button>
          <h5 style={{ color: "#ffff", textAlign: "center", margin:"0 auto"  }}>Bebida</h5>
        </div>
      </Box>
      <Box className="list-scroll">
        {menu.length > 0 ? (
          menu.map((item) => <Item key={item.id} {...item} />)
        ) : (
          <h1>Loading...</h1>
        )}
      </Box>
    </Container>
  );
};