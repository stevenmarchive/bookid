<?php

namespace App\Controller\Admin;

use App\Entity\Emprunt;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EmpruntCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Emprunt::class;
    }

public function configureFields(string $pageName): iterable
{
    yield from parent::configureFields($pageName);
    yield AssociationField::new('exemplaire');
    yield AssociationField::new('adherent');
}

}
