<?php
namespace App\Controller;

use SebastianBergmann\Template\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        $data = [
            ['firstname'=>'John', 'lastname'=>'Doé', 'phone'=>'01 02 02 15 14', 'id'=>'1', 'msg'=>'Hello world i am forntend developer !'],
            ['firstname'=>'Serge', 'lastname'=>'Lema', 'phone'=>'07 02 07 15 14', 'id'=>'2', 'msg'=>'Hello world i am backend developer !']
        ];

        return $this->render('default/home.html.twig', ['data'=>$data]);
    }

    #[Route('/view/{id}', name: 'app_view')]
    public function view(int $id): Response
    {

        return $this->render('default/view.html.twig', ['param'=>$id]);
    }
}