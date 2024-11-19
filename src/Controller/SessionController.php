<?php

namespace App\Controller;

use App\Service\SessionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    public function __construct(
        private readonly SessionService $sessionService
    )
    {
        
    }

    #[Route('/sesion/shopping-cart',name:'session_shopping_cart')]
    public function getShoppingCart():Response
    {
        return $this->json([]);
    }
}
