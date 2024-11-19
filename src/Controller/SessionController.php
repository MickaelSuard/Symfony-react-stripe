<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\SessionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/session')]
class SessionController extends AbstractController
{   
    public function __construct(
        private readonly SessionService $sessionService
    )
    {
        
    }

    #[Route('/shopping-cart',name:'session_shopping_cart')]
    public function getShoppingCart(): Response
    {
        return $this->json($this->sessionService->getShoppingCart());
    }

    #[Route('/shopping-cart/{id}',name:'session_add_item_to_shopping_cart')]
    public function addItemToShoppingCart(?Product $product)
    {
        if($product){
            return  $this->sessionService->addItemShoppingCart($product);
        }

       

         return $this->json($this->sessionService->getShoppingCart());
    }

}
// Probleme de route !!!
