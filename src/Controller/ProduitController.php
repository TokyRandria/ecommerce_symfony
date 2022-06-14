<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/produit', name: 'app_produit')]
class ProduitController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/index.html.twig',[
            'produits' => $produitRepository->findAll(),
        ]);
    }

    #[Route('/{libelle}', name: 'details')]
    public function details(Produit $produit): Response
    {
        return $this->render('produit/details.html.twig', compact('produit'));
    }

}
