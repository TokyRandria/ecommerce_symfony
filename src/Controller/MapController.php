<?php

namespace App\Controller;

use App\Repository\AdresseRepereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/map')]
class MapController extends AbstractController
{
    #[Route('/', name: 'map_index')]
    public function index(AdresseRepereRepository $adresseRepereRepository): Response
    {
        return $this->render('zones_de_livraison/index.html.twig',[
            'adresse_reperes' => $adresseRepereRepository->findAll(),
        ]);
    }
}