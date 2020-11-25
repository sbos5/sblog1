<?php

namespace App\Controller;

use App\Entity\Artikle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArtikleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Artikle::class;
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
