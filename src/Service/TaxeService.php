<?php

namespace App\Service;

use App\Entity\Taxe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Twig\Environment;

class TaxeService
{

    public function __construct(
        private EntityManagerInterface $em,
        private Environment $environment
    ) {}
    public function handleTaxeForm(FormInterface $taxeForm) : JsonResponse
    {
         /** @var Taxe $taxe */
         $taxe = $taxeForm->getData();

          /** @var UploadedFile $uploadedThumbnail */
        /* $uploadedThumbnail = $taxeForm['thumbnail']->getData();

          /** @var UploadedFile $uploadedVideo */
     /*   $uploadedTaxe = $taxeForm['videoFile']->getData();

        $newFileName = $this->renameUploadedFile($uploadedThumbnail, $this->parameters->get('thumbnails.upload_directory'));
        $taxe->setThumbnail($newFileName);
        $newFileName = $this->renameUploadedFile($uploadedTaxe, $this->parameters->get('videos.upload_directory'));
        $video->setVideoFile($newFileName);
       
        $this->em->persist($video);
        $this->em->flush(); */

        return new JsonResponse([
            'html' => $this->environment->render('taxe/index.html.twig', [
                'taxe' => $taxe
            ])
        ]);

    }

}