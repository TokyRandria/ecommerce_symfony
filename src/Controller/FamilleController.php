<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Form\FamilleType;
use App\Repository\FamilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ImageUploader;
use App\Service\ContainerParametersHelper;

#[Route('/famille')]
class FamilleController extends AbstractController
{



    #[Route('/home/{id1}/{id2}', name: 'app_famille_index', methods: ['GET','POST'])]
    public function index(FamilleRepository $familleRepository, int $id1=0,int $id2=0): Response
    {
        $famillesp = $familleRepository->famillePrime();
        $famillese = $familleRepository ->familleenfant($id1);
        $famillesdernieres = $familleRepository -> familleenfant($id2);

        return $this->render('famille/index.html.twig', [
           'famillesp'=>$famillesp,
            'famillese'=>$famillese,
            'famillesdernieres'=>$famillesdernieres
        ]);
    }

    #[Route('/new', name: 'app_famille_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FamilleRepository $familleRepository,ImageUploader $img_uploader,ContainerParametersHelper $pathHelpers): Response
    {
        $famille = new Famille();
        $form = $this->createForm(FamilleType::class, $famille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image=$form['image_rep']->getData();
            if ($image)
            {
               // $image_name=$img_uploader->imgCharge($image);
             //   if (null !== $image_name) // for example
             //   {
//                $directory = $img_uploader->getTargetDirectory();
//                $directory = $pathHelpers->getApplicationRootDir();
//                $directory = $this->getParameter('kernel.project_dir');
//                $full_path = $directory.'/'.$image_name;
                    $destination = $this->getParameter('kernel.project_dir').'/public/uploads/familles';
                    $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $newFilename = $originalFilename.'-'.uniqid().'.'.$image->guessExtension();
                    $image->move(
                        $destination,
                        $newFilename
                    );
                    $famille->setImageRep('/uploads/familles/'.$newFilename);

            }
            $familleRepository->add($famille, true);

            return $this->redirectToRoute('app_famille_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('famille/new.html.twig', [
            'famille' => $famille,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_famille_show', methods: ['GET'])]
    public function show(Famille $famille): Response
    {
        return $this->render('famille/show.html.twig', [
            'famille' => $famille,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_famille_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Famille $famille, FamilleRepository $familleRepository): Response
    {
        $form = $this->createForm(FamilleType::class, $famille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $familleRepository->add($famille, true);

            return $this->redirectToRoute('app_famille_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('famille/edit.html.twig', [
            'famille' => $famille,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_famille_delete', methods: ['GET','POST'])]
    public function delete(Request $request, Famille $famille, FamilleRepository $familleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$famille->getId(), $request->request->get('_token'))) {
            $familleRepository->remove($famille, true);
        }
        return $this->redirectToRoute('app_famille_index', [], Response::HTTP_SEE_OTHER);
    }
}
