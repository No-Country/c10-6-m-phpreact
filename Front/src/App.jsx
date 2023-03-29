import { useState } from 'react'
import {BrowserRouter, Route, Routes } from 'react-router-dom'
import { Home } from './components/home'
import { HomeCarousel } from './components/HomeCarousel'
import { ItemList } from './components/ItemList'
import {NavBar} from "./components/NavBar"


function App() {
  return (
    <>
    <BrowserRouter>
          <NavBar/>
          <Routes>
            <Route exact path='/' element={ <Home/>}/>

          </Routes>
    </BrowserRouter>
        
    </>
  )
}

export default App
