import {configureStore,combineReducers} from '@reduxjs/toolkit';

import userReducer from './reducers/user/userSlice'
import orderReducer from './reducers/order/orderSlice'
import storage from 'redux-persist/lib/storage';
import {persistReducer} from 'redux-persist'
import thunk from 'redux-thunk'

const persistConfig = {
    key:'root',
    storage,
    whitelist:['order'],
    
}

const rootReducer = combineReducers({
    user:userReducer,
    order:orderReducer
})

const persistedReducer = persistReducer(persistConfig,rootReducer)




export const store = configureStore({
    // reducer:{
    //     user: userReducer,
    //     order: orderReducer
    // },
    reducer : persistedReducer,middleware:[thunk]
})