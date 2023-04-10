import { createSlice, current } from '@reduxjs/toolkit'

const initialState = {
    totalCount:0,
    productList:[],
}

// export const orderSlice = createSlice({
//   name: 'order',
//   initialState: initialState,
//   reducers: {


//         addToOrder:(state,action)=>{

//             const {id} = action.payload

//             if ( state.productList.filter(e=>e.id == id).length === 0) {

//                 state.totalCount = state.totalCount + action.payload.cantidad; 
//                 state.productList=[...state.productList,action.payload]; 
            
//               }else if (state.productList.find(e=>e.id === id) ){

//                state.totalCount = state.totalCount + action.payload.cantidad;
                  
//                   let newArr = [...current(state.productList)] 
//                   let itemIndex = newArr.findIndex(e => e.id === id) 
//                   newArr[itemIndex].cantidad =  newArr[itemIndex].cantidad + action.payload.cantidad; 
//                   state.productList = newArr; 
            
                 

//             }
//                   },

                 

//   }
// }) el mio !!!!!! OMG



export const orderSlice = createSlice({
  name: 'order',
  initialState: initialState,
  reducers: {
    addToOrder: (state, action) => {
      const { id, cantidad } = action.payload;
      const index = state.productList.findIndex((p) => p.id === id);

      if (index === -1) {
        state.totalCount += cantidad;
        state.productList.push(action.payload);
      } else {
        state.totalCount += cantidad;
        state.productList[index].cantidad += cantidad;
      }
    },
    
    removeFromOrder : (state,action)=>{
      const{ id , cantidad}= action.payload;
      const newArr = state.productList.filter(e => e.id !== id);
      state.productList = newArr;
     state.totalCount -= cantidad;
    },



  },
}); 







export const { addToOrder,removeFromOrder } = orderSlice.actions  

export default orderSlice.reducer







