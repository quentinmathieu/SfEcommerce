<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TwigController extends AbstractController
{
    #[Route('/', name: 'app')]
    public function home(ProductRepository $productRepo): Response
    {

       
        return $this->render('twig/index.html.twig', [
            'controller_name' => 'TwigController',
            'products' => $productRepo->findAll()
        ]);    
    }

    // #[Route('/twig', name: 'app_twig')]
    // public function index(): Response
    // {
    //     return $this->render('twig/index.html.twig', [
    //         'controller_name' => 'TwigController',
    //     ]);
    // }
}
