<?php

namespace App\Controller;

use App\Entity\ValeurCaracteristique;
use App\Form\ValeurCaracteristiqueType;
use App\Repository\ValeurCaracteristiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/valeur/caracteristique')]
class ValeurCaracteristiqueController extends AbstractController
{
    #[Route('/', name: 'app_valeur_caracteristique_index', methods: ['GET'])]
    public function index(ValeurCaracteristiqueRepository $valeurCaracteristiqueRepository): Response
    {
        return $this->render('valeur_caracteristique/index.html.twig', [
            'valeur_caracteristiques' => $valeurCaracteristiqueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_valeur_caracteristique_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ValeurCaracteristiqueRepository $valeurCaracteristiqueRepository): Response
    {
        $valeurCaracteristique = new ValeurCaracteristique();
        $form = $this->createForm(ValeurCaracteristiqueType::class, $valeurCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $valeurCaracteristiqueRepository->add($valeurCaracteristique, true);

            return $this->redirectToRoute('app_valeur_caracteristique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('valeur_caracteristique/new.html.twig', [
            'valeur_caracteristique' => $valeurCaracteristique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_valeur_caracteristique_show', methods: ['GET'])]
    public function show(ValeurCaracteristique $valeurCaracteristique): Response
    {
        return $this->render('valeur_caracteristique/show.html.twig', [
            'valeur_caracteristique' => $valeurCaracteristique,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_valeur_caracteristique_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ValeurCaracteristique $valeurCaracteristique, ValeurCaracteristiqueRepository $valeurCaracteristiqueRepository): Response
    {
        $form = $this->createForm(ValeurCaracteristiqueType::class, $valeurCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $valeurCaracteristiqueRepository->add($valeurCaracteristique, true);

            return $this->redirectToRoute('app_valeur_caracteristique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('valeur_caracteristique/edit.html.twig', [
            'valeur_caracteristique' => $valeurCaracteristique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_valeur_caracteristique_delete', methods: ['POST'])]
    public function delete(Request $request, ValeurCaracteristique $valeurCaracteristique, ValeurCaracteristiqueRepository $valeurCaracteristiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$valeurCaracteristique->getId(), $request->request->get('_token'))) {
            $valeurCaracteristiqueRepository->remove($valeurCaracteristique, true);
        }

        return $this->redirectToRoute('app_valeur_caracteristique_index', [], Response::HTTP_SEE_OTHER);
    }
}
