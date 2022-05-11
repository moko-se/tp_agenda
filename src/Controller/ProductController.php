<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function createProduct(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        
        $product = new Product();
        $product->setName('keyboard');
        $product->setPrice(1999);
        $product->setDescription('this is my descrition');

        $entityManager->persist($product);
        $entityManager->flush();

        return new Response('Saved new product width ID '.$product->getId());
    }

    #[Route('/product/{id}', name: 'app_updateproduct')]
    public function updateProduct(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        
        // $product = new Product();
        // $product->setName('keyboard');
        // $product->setPrice(1999);
        // $product->setDescription('this is my descrition');

        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        $product->setName('My new name');
        $entityManager->flush();

        return new Response('Saved new product width ID '.$product->getId());
    }
    #[Route('/product/{id}', name: 'app_removeproduct')]
    public function removeProduct(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();

        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        $entityManager->remove($product);
        $entityManager->flush();

        return new Response('remove product with ID '.$product->getId());
    }
}