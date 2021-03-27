<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ActualiteRepository $actualiteRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'actus' => $actualiteRepository->findAll()
        ]);
    }
}
//https://www.data.gouv.fr/fr/datasets/r/219427ba-7e90-4eb1-9ac7-4de2e7e2112c
