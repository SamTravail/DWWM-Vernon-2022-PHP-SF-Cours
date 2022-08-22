<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
    public function contact(Request $request)
    {
        $formulaire = $this->createFormBuilder()
            ->add('Nom', TextType::class,
                ['attr' => ['class' => 'formCss']])
            ->add('Prenom', TextType::class)
            ->add('Mail', EmailType::class)
            ->add('Entreprise', TextType::class,
                ['required' => false])
            ->add('Telephone', TelType::class)
            ->add('Objet_du_message', ChoiceType::class,
                ['choices' => ['machine' => 'message', 'truc' => 'truc', 'bidule' => 'bidule']])
            ->add('Message', TextareaType::class)
            ->add('Envoyer', SubmitType::class)
            ->add('Annuler', ResetType::class)
            // ->setMethod('post')
            // ->setAction('/')
            ->getForm();

        $formulaire->handleRequest($request);

        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            dd($formulaire->getData()); // Récupère les datas du formulaire sous forme de tableau associatif
        }

        return $this->render('public/contact.html.twig', [
            'controller_name' => 'Who am I?',
            'frmContact' => $formulaire->createView()
        ]);
    }
}
