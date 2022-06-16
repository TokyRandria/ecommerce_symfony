<?php

namespace App\Controller;

use App\Entity\PhotoArticle;
use App\Form\PhotoArticleType;
use App\Repository\PhotoArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/photo/article')]
class PhotoArticleController extends AbstractController
{
    #[Route('/', name: 'app_photo_article_index', methods: ['GET'])]
    public function index(PhotoArticleRepository $photoArticleRepository): Response
    {
        return $this->render('photo_article/index.html.twig', [
            'photo_articles' => $photoArticleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_photo_article_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PhotoArticleRepository $photoArticleRepository): Response
    {
        $photoArticle = new PhotoArticle();
        $form = $this->createForm(PhotoArticleType::class, $photoArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form['photoRep']->getData();
            $destination = $this->getParameter('kernel.project_dir').'/public/uploads/articles';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $destination,
                $newFilename
            );

//            $gmagick = new Gmagick($uploadedFile);
//            $gmagick->resizeimage(1024)


            $photoArticle->setPhotoRep('/uploads/articles/'.$newFilename);
            $photoArticleRepository->add($photoArticle,true);
            return $this->redirectToRoute('app_photo_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('photo_article/new.html.twig', [
            'photo_article' => $photoArticle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_photo_article_show', methods: ['GET'])]
    public function show(PhotoArticle $photoArticle): Response
    {
        return $this->render('photo_article/show.html.twig', [
            'photo_article' => $photoArticle,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_photo_article_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PhotoArticle $photoArticle, PhotoArticleRepository $photoArticleRepository): Response
    {
        $form = $this->createForm(PhotoArticleType::class, $photoArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photoArticleRepository->add($photoArticle, true);

            return $this->redirectToRoute('app_photo_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('photo_article/edit.html.twig', [
            'photo_article' => $photoArticle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_photo_article_delete', methods: ['POST'])]
    public function delete(Request $request, PhotoArticle $photoArticle, PhotoArticleRepository $photoArticleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photoArticle->getId(), $request->request->get('_token'))) {
            $photoArticleRepository->remove($photoArticle, true);
        }

        return $this->redirectToRoute('app_photo_article_index', [], Response::HTTP_SEE_OTHER);
    }
}
