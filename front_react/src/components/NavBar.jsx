import * as React from 'react';
import { NavLink } from 'react-router-dom';
import { Grid,IconButton,Button,Typography,Toolbar,Box,AppBar } from '@mui/material';



export const NavBar =  () => {
  return (

    <footer style={   {padding:"0 33% 0 33%", width:"100%",position:"fixed", bottom:"10px", margin:"0 auto"}}>
      <NavLink style={{ display:"flex" ,borderRadius:"16px", backgroundColor:"#FF5733", width:"100% ", height:"5vh",justifyContent:"center",paddingTop:"0.8%"}} to={'/orden'}>mi pedido!</NavLink>
    </footer>
    
  );
}
















// <Box sx={{ flexGrow: 2 }} >
// <AppBar position="fixed"  sx={{bgcolor:"gray",width:"100%"}} > 

//   <Toolbar sx={{width:"100%" , display:"flex",justifyContent:"space-between"}}>

//     <IconButton size="large" edge="start"  color="gray"  aria-label="menu"  sx={{ }} >
//       logo
//     </IconButton>
   
//     <Typography  variant="h6" component="div" sx={{  mr:"100px" }}>
//      lorem 
//     </Typography>
    
//     <Button  color="inherit" sx={{}}>Login</Button>

//   </Toolbar>
//     <NavLink to={'/orden'}>mi pedido!</NavLink>
// </AppBar>




// </Box>
