<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GlobaleController extends AbstractController
{
    #[Route('/', name: 'globale')]
    public function index(): Response
    {
        return $this->render('globale/index.html.twig');
    }
}