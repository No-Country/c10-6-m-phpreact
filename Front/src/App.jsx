import { useState } from 'react'
import { useSelector } from 'react-redux'
import {BrowserRouter, Route, Routes } from 'react-router-dom'
import { Home } from './components/home'
import { HomeCarousel } from './components/HomeCarousel'
import { ItemDetailContainer } from './components/ItemDetailContainer'
import { ItemList } from './components/ItemList'
import {NavBar} from "./components/NavBar"
import { Order } from './components/Order'
import "./css/home.css"

function App() {

  const { productList, totalCount } = useSelector(state => state.order);

  return (
    <>
    <BrowserRouter >
          
          <Routes>
            <Route exact path='/' element={ <Home/>}/>
            <Route exact path='/plato/:id' element={<ItemDetailContainer></ItemDetailContainer>}></Route>
            <Route exact path='/orden' element={<Order/>}/>
          </Routes>
         
          
    </BrowserRouter>
        
    </>
  )
}

export default App
