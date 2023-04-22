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
      console.log(current(state.productList))
    },
  
    
    removeFromOrder : (state,action)=>{
      const {id,cantidad}= action.payload;
      let item = state.productList.find((e)=>e.id === id) 

      if (item) {
        state.totalCount -= cantidad;
        state.productList= state.productList.filter(e => e.id !== id);
      }

      // if (state.productList.some(e=>e.id===id)) {

      //   const newArr = 
      //   state.productList = newArr;
       
      //   console.log("entra en el if")

      // }
  
    },

    removeAllfromOrder : (state,action)=>{
      state.totalCount=0
      state.productList = []
    }



  },
}); 







export const { addToOrder,removeFromOrder,removeAllfromOrder } = orderSlice.actions  

export default orderSlice.reducer







