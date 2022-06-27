<?php

namespace App\Controller;

use App\Entity\AdresseRepere;
use App\Form\AdresseRepereType;
use App\Repository\AdresseRepereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/adresse/repere')]
class AdresseRepereController extends AbstractController
{
    #[Route('/', name: 'app_adresse_repere_index', methods: ['GET'])]
    public function index(AdresseRepereRepository $adresseRepereRepository): Response
    {
        return $this->render('adresse_repere/index.html.twig', [
            'adresse_reperes' => $adresseRepereRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_adresse_repere_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AdresseRepereRepository $adresseRepereRepository): Response
    {
        $adresseRepere = new AdresseRepere();
        $form = $this->createForm(AdresseRepereType::class, $adresseRepere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adresseRepereRepository->add($adresseRepere, true);

            return $this->redirectToRoute('app_adresse_repere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adresse_repere/new.html.twig', [
            'adresse_repere' => $adresseRepere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adresse_repere_show', methods: ['GET'])]
    public function show(AdresseRepere $adresseRepere): Response
    {
        return $this->render('adresse_repere/show.html.twig', [
            'adresse_repere' => $adresseRepere,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_adresse_repere_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AdresseRepere $adresseRepere, AdresseRepereRepository $adresseRepereRepository): Response
    {
        $form = $this->createForm(AdresseRepereType::class, $adresseRepere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adresseRepereRepository->add($adresseRepere, true);

            return $this->redirectToRoute('app_adresse_repere_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adresse_repere/edit.html.twig', [
            'adresse_repere' => $adresseRepere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adresse_repere_delete', methods: ['POST'])]
    public function delete(Request $request, AdresseRepere $adresseRepere, AdresseRepereRepository $adresseRepereRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adresseRepere->getId(), $request->request->get('_token'))) {
            $adresseRepereRepository->remove($adresseRepere, true);
        }

        return $this->redirectToRoute('app_adresse_repere_index', [], Response::HTTP_SEE_OTHER);
    }
}
