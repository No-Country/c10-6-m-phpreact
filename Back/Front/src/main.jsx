import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App'
import './index.css'
import { BrowserRouter } from 'react-router-dom';

//impor de roboto font para material ui 
import '@fontsource/roboto/300.css';
import '@fontsource/roboto/400.css';
import '@fontsource/roboto/500.css';
import '@fontsource/roboto/700.css';
import { CssBaseline } from '@mui/material';


ReactDOM.createRoot(document.getElementById('root')).render(

  <React.StrictMode>
    <CssBaseline/>

      <App />
    
  </React.StrictMode>,

)
