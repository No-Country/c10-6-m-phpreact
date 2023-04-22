import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App'
import './index.css'
//redux
import { Provider } from 'react-redux'
import { store } from './redux/store'
//persistencia del estado global
import{PersistGate} from 'redux-persist/integration/react';
import {persistStore} from 'redux-persist'

const persistor = persistStore(store);


//import { BrowserRouter } from 'react-router-dom';

//import de roboto font para material ui 
import '@fontsource/roboto/300.css';
import '@fontsource/roboto/400.css';
import '@fontsource/roboto/500.css';
import '@fontsource/roboto/700.css';
import { CssBaseline } from '@mui/material';


ReactDOM.createRoot(document.getElementById('root')).render(

  <React.StrictMode >
    <CssBaseline/>
    <PersistGate persistor={persistor}>
      
      <Provider store={store}>
        
        <App  />
        
      </Provider>
    
    </PersistGate>
  </React.StrictMode>,

)
