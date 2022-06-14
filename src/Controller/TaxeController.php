<?php

namespace App\Controller;

use App\Entity\Taxe;
use App\Form\TaxeType;
use App\Repository\TaxeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TaxeService;

#[Route('/taxe')]
class TaxeController extends AbstractController
{
     #[Route('/', name: 'app_taxe_index', methods: ['GET','POST'])]
    public function index_backup(TaxeRepository $taxeRepository): Response
    {
        return $this->render('taxe/index.html.twig', [
            'taxes' => $taxeRepository->findAll(),
        ]);
    } 
   /*  #[Route('/', name: 'app_taxe_index', methods: ['GET','POST'])]
    public function index(RequestStack $requestStack,TaxeRepository $taxeRepository,TaxeService $taxeservice): Response
    {
        $taxe = new Taxe();
        $request = $requestStack->getMainRequest(); 
        $taxeForm = $this->createForm(TaxeType::class,$taxeRepository->add($taxe));
        $taxeForm->handleRequest($request);

        if ($taxeForm->isSubmitted()) {
            return $taxeservice->handleTaxeForm($taxeForm);
        }

        return $this->render('taxe/index.html.twig', [
            'form' => $taxeForm->createView(),
            'taxes' => $taxeRepository->findAll(),
        ]);
    }
 */
    

    #[Route('/new', name: 'app_taxe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TaxeRepository $taxeRepository): Response
    {
        $taxe = new Taxe();
        $form = $this->createForm(TaxeType::class, $taxe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $taxeRepository->add($taxe, true);

            return $this->redirectToRoute('app_taxe_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('taxe/new.html.twig', [
            'taxe' => $taxe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_taxe_show', methods: ['GET'])]
    public function show(Taxe $taxe): Response
    {
        return $this->render('taxe/show.html.twig', [
            'taxe' => $taxe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_taxe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Taxe $taxe, TaxeRepository $taxeRepository): Response
    {
        $form = $this->createForm(TaxeType::class, $taxe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $taxeRepository->add($taxe, true);

            return $this->redirectToRoute('app_taxe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('taxe/edit.html.twig', [
            'taxe' => $taxe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_taxe_delete', methods: ['POST'])]
    public function delete(Request $request, Taxe $taxe, TaxeRepository $taxeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$taxe->getId(), $request->request->get('_token'))) {
            $taxeRepository->remove($taxe, true);
        }

        return $this->redirectToRoute('app_taxe_index', [], Response::HTTP_SEE_OTHER);
    }

}
