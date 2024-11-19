import React, { useEffect, useState } from 'react'

export interface products {
    active : boolean;
    createdAt: Date;
    description : string;
    id:number;
    name:string;
    price : number;
    // imageFile : string;
    // stripeProductId : string;
    // stipePriceId: string;
}

export default function useProducts() {
    const [products,setProducts] = useState([]);

    useEffect(() => {
        fetch('/api/products')
        .then(response => response.json())
        .then(json =>setProducts(json));
    }, []);

    return products;
}
