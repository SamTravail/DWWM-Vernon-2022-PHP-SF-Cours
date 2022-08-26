<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateurs;
use App\Entity\Role;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class UtilisateursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateurs::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Prenom'),
            TextField::new('Nom'),
            EmailField::new('Email'),
            //IntegerField::new('Role_id'),
        ];
    }

}
