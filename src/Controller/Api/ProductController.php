<?php

namespace App\Controller\Api;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ProductController extends AbstractController
{

    #[Route('/api/products',name:'api_get_products',methods:['GET'])]
    public function getProduct(ProductRepository $productRepository, NormalizerInterface $normalizer):Response
    {
        $products = $productRepository->findAll();

        $serializeProducts = $normalizer->normalize($products, 'json',[
            'groups' => 'product:read'
        ]);

        return $this->json($serializeProducts);

    }

}
