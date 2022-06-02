<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CaracteristiqueController extends AbstractController
{
    #[Route('/caracteristique', name: 'app_caracteristique')]
    public function index(): Response
    {
        return $this->render('caracteristique/index.html.twig', [
            'controller_name' => 'CaracteristiqueController',
        ]);
    }
}
