<?php

namespace App\Controller;

use App\Entity\Messages;
use App\Form\MessagesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('public/home.html.twig', [
            'controller_name' => 'Home page',
        ]);
    }

    #[Route('/whoami', name: 'whoami')]
    public function about(): Response
    {
        return $this->render('public/whoami.html.twig', [
            'controller_name' => 'Who am I?',
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, EntityManagerInterface $entityManager): Response
    {
        $messages = new Messages();
        
        $contactFormulaire = $this->createForm(MessagesType::class, $messages);
        // dd($contactFormulaire);
        $contactFormulaire->handleRequest($request);

        // dd($contactFormulaire);

        if ($contactFormulaire->isSubmitted() && $contactFormulaire->isValid()) {
            $entityManager->persist($contactFormulaire);
            $entityManager->flush($contactFormulaire);

            return new Response('Ayé enfin');
        }

        return $this->render('public/contact.html.twig', [
            'controller_name' => 'Formulaire de contact qui marche',
            'frmContact' => $contactFormulaire->createView()
        ]);
    }
}
