<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Email;

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
    public function contact(): Response
    {
        $formulaire = $this->createFormBuilder()
            ->add('Nom', TextType::class,
                ['attr' => ['class' => 'formCss']])
           ->add('Prenom',TextType::class,
            ['attr' => ['class' => 'formCss']])
            ->add('Entreprise',TextType::class,
                ['attr' => ['class' => 'formCss']])
            ->add('Email',TextType::class,
                ['attr' => ['class' => 'formCss']])
            ->add('Tel:',TextType::class,
                ['attr' => ['class' => 'formCss']])
            ->add('Message',TextType::class,
                ['attr' => ['class' => 'formCss']])
            ->add('Envoyer', SubmitType::class)
            ->getForm();

        return $this->render('public/contact.html.twig', [
            'controller_name' => 'Who am I?',
            'frmContact' => $formulaire->createView()
        ]);
    }
}
