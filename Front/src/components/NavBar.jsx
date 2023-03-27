import * as React from 'react';
import { Link } from 'react-router-dom';
import { Grid,IconButton,Button,Typography,Toolbar,Box,AppBar } from '@mui/material';



export const NavBar =  () => {
  return (
    <Box sx={{ flexGrow: 2 }} >
      <AppBar position="fixed"  sx={{bgcolor:"gray",width:"100%"}} > 

        <Toolbar sx={{width:"100%" , display:"flex",justifyContent:"space-between"}}>

          <IconButton size="large" edge="start"  color="gray"  aria-label="menu"  sx={{ }} >
            hola
          </IconButton>
         
          <Typography  variant="h6" component="div" sx={{  mr:"100px" }}>
            por que viejo aca esto
          </Typography>
          
          <Button  color="inherit" sx={{}}>Login</Button>

        </Toolbar>

      </AppBar>
    </Box>
    
  );
}