<?php

namespace App\Controller;


use App\Entity\User;
use App\Entity\Taxe;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client')]
class ClientController extends AbstractController
{
    #[Route('/', name: 'app_client_index', methods: ['GET','POST'])]
    public function index(UserRepository $clientRepository): Response
    {
        return $this->render('client/index.html.twig', [
            'clients' => $clientRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_client_valid', methods: ['GET','POST'])]
    public function validate(User $client, UserRepository $clientRepository ): Response
    {
        $client->setEstValide(true);
        $clientRepository ->add($client,true);
        return $this->render('client/index.html.twig', [
            'clients' => $clientRepository->findAll(),
        ]);
    }
}