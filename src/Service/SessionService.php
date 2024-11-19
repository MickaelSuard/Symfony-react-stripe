<?php

namespace App\Service;

use App\Entity\Product;
use App\Model\ShoppingCart;
use App\Model\ShoppingCartItem;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionService
{
    public const SHOPPING_CART = 'shoppingCart';


    public function __construct(
        private RequestStack $requestStack
    )
    {
        
    }

    public function getShoppingCart()
    {
        return $this->getSession()->get(self::SHOPPING_CART,new ShoppingCart());
    }

    public function addItemShoppingCart(Product $product)
    {
        $shoppingCart = $this->getShoppingCart();

        $existingShoppingCartItem = $this->getExistingShoppingCardItem($product);

        if($existingShoppingCartItem){
            $existingShoppingCartItem->quantity++;
        } else {
            $shoppingCart->items->add(new ShoppingCartItem($product,quantity:1));
        }

        $this->getSession()->set(self::SHOPPING_CART,$shoppingCart);

    }

    private function getExistingShoppingCardItem(Product $product)
    {
        $existingShoppingCartItem = $this
        ->getShoppingCart()
        ->items
        ->filter(fn (ShoppingCartItem $item) => $item->product->getId() == $product->getId())
        ->first();

        if (false == $existingShoppingCartItem) {
            return null;
        }
        return $existingShoppingCartItem;
    }

    private function getSession(): SessionInterface
    {
        return $this->requestStack->getSession();
    }
}