<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    #[Route('/hello-world/{name}/', name: 'app_helloWorld')]
    public function hello(string $name): Response
    {
        return $this->render('default/index.html.twig', ['name' => $name,]);
    }
}