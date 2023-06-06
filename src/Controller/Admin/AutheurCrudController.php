<?php

namespace App\Controller\Admin;

use App\Entity\Autheur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AutheurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Autheur::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
