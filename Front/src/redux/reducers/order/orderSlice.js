import { createSlice } from '@reduxjs/toolkit'

const initialState = {
    totalCount:0,
    productList:[],
}

export const orderSlice = createSlice({
  name: 'order',
  initialState: initialState,
  reducers: {
        addToOrder:(state,action)=>{
            state.totalCount += 1; 
            state.productList=[...state.productList,action.payload];
        }
  }
})

// Action creators are generated for each case reducer function
export const {addToOrder } = orderSlice.actions  

export default orderSlice.reducer