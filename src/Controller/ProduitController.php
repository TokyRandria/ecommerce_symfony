<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Entity\Produit;
use App\Form\FamilleType;
use App\Form\ProduitType;
use App\Repository\FamilleRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/produit')]
class ProduitController extends AbstractController
{
    #[Route('/', name: 'app_produit_index')]
    public function index(ProduitRepository $produitRepository, Request $request): Response
    {
        $searchTerm = $request->query->get('q');
        $searchResult= $produitRepository->recherche($searchTerm);
        dump($searchTerm);
        if ($request->query->get('preview')) {
            return $this->render('produit/_resultatRecherche.html.twig', [
                'resultats' => $searchResult,
            ]);
        }
        return $this->render('produit/index.html.twig',[
            'resultats'=>$searchResult,
            'searchTerm' => $searchTerm,
            //'produits' => $produitRepository->findAll(),
        ]);
    }

//    #[Route('/{libelle}', name: 'app_produit_details')]
//    public function details(Produit $produit): Response
//    {
//        return $this->render('produit/details.html.twig', compact('produit'));
//    }

    #[Route('/new', name: 'app_produit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProduitRepository $produitRepository): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $produitRepository->add($produit, true);
            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
            }

        return $this->renderForm('produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }
//    #[Route('/new', methods: ['GET', 'POST'])]
//    public function new(Request $request, ProduitRepository $produitRepository): Response
//    {
//        $produit = new Produit();
//        $form = $this->createForm(ProduitType::class, $produit);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $produitRepository->add($produit, true);
//            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
//        }
//
//        return $this->renderForm('produit/index.html.twig', [
//            'produits' => $produitRepository->findAll(),
//        ]);
//    }

}
