<?php

namespace App\Controller;

use App\Entity\TypeCaracteristique;
use App\Form\TypeCaracteristiqueType;
use App\Repository\TypeCaracteristiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/caracteristique')]
class TypeCaracteristiqueController extends AbstractController
{
    #[Route('/', name: 'app_type_caracteristique_index', methods: ['GET'])]
    public function index(TypeCaracteristiqueRepository $typeCaracteristiqueRepository): Response
    {
        return $this->render('type_caracteristique/index.html.twig', [
            'type_caracteristiques' => $typeCaracteristiqueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_caracteristique_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeCaracteristiqueRepository $typeCaracteristiqueRepository): Response
    {
        $typeCaracteristique = new TypeCaracteristique();
        $form = $this->createForm(TypeCaracteristiqueType::class, $typeCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeCaracteristiqueRepository->add($typeCaracteristique, true);

            return $this->redirectToRoute('app_type_caracteristique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_caracteristique/new.html.twig', [
            'type_caracteristique' => $typeCaracteristique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_caracteristique_show', methods: ['GET'])]
    public function show(TypeCaracteristique $typeCaracteristique): Response
    {
        return $this->render('type_caracteristique/show.html.twig', [
            'type_caracteristique' => $typeCaracteristique,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_caracteristique_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeCaracteristique $typeCaracteristique, TypeCaracteristiqueRepository $typeCaracteristiqueRepository): Response
    {
        $form = $this->createForm(TypeCaracteristiqueType::class, $typeCaracteristique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeCaracteristiqueRepository->add($typeCaracteristique, true);

            return $this->redirectToRoute('app_type_caracteristique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_caracteristique/edit.html.twig', [
            'type_caracteristique' => $typeCaracteristique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_caracteristique_delete', methods: ['POST'])]
    public function delete(Request $request, TypeCaracteristique $typeCaracteristique, TypeCaracteristiqueRepository $typeCaracteristiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeCaracteristique->getId(), $request->request->get('_token'))) {
            $typeCaracteristiqueRepository->remove($typeCaracteristique, true);
        }

        return $this->redirectToRoute('app_type_caracteristique_index', [], Response::HTTP_SEE_OTHER);
    }
}
