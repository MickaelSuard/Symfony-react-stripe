import { AppBar, Badge, Grid, IconButton, Toolbar } from '@mui/material'
import React from 'react'
import StoreIcon from '@mui/icons-material/Store'
import { visit } from '../../utils'
import  ShoppingBasketIcon  from '@mui/icons-material/ShoppingBasket'

function Header() {

    const showHome = () :void => {
        visit('/');
    }

    const showShoppingCart = ():void => {
        visit('/shopping-cart');
    }

  return (
    <AppBar position='static'>
        <Toolbar>
            <Grid container justifyContent="space-between" alignItems="center" style={{width : '100%'}}>
                <Grid item>
                    <IconButton color="inherit" onClick={showHome}>
                        <StoreIcon/>
                    </IconButton>
                </Grid>
                <Grid item>
                    <IconButton color='inherit' onClick={showShoppingCart}>
                        <Badge badgeContent={0} color='secondary'>
                            <ShoppingBasketIcon/>
                        </Badge>
                    </IconButton>
                </Grid>
            </Grid>
        </Toolbar>
    </AppBar>
    
  )
}

export default Header