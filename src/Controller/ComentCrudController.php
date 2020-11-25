<?php

namespace App\Controller;

use App\Entity\Coment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ComentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Coment::class;
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
