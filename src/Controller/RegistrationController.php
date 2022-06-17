<?php

namespace App\Controller;

use App\vendor\autoload;
use \SimonDevelop\Sirene;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\ConnexionAuthAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{


    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher,
     UserAuthenticatorInterface $userAuthenticator, ConnexionAuthAuthenticator $authenticator,
      EntityManagerInterface $entityManager): Response
    {
        $sirene = new Sirene([
            "secret" => base64_encode("7YsTS3UWizbx4wm6GedyPsW22LEa:mf1Bwjj5qP7iQNyq8ckL55mATLca"),
            "jwt_path" => __DIR__ // Chemin où sera stocké le token d'accès (fichier json)
        ]);

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $result = $sirene->siret($user->getNumeroSiret());
            if ($result["header"]["statut"]==404){
                return new Response("Aucun établissement trouvé avec ce siret");
            }
            if ($result["header"]["statut"]==400){
                return new Response("Format de siret non valide");
            }
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setEstValide(false);

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
