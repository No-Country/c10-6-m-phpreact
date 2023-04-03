import { useState } from 'react'
import {BrowserRouter, Route, Routes } from 'react-router-dom'
import { ItemList } from './components/ItemList'
import {NavBar} from "./components/NavBar"


function App() {
  return (
    <>
    <BrowserRouter>
          <NavBar/>
          <Routes>
            <Route exact path='/' element={ <ItemList/>}/>
          </Routes>
    </BrowserRouter>
        
    </>
  )
}

export default App
