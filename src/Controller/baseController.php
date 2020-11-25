<?php
namespace App\Controller;
use App\Form\ArtFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of baseController
 *
 * @author Sławomir
 */
class baseController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController

{
    /** 
     * @Route(path="/sblog2" ,name="base")
     */
    public function Title()
    {
        $form=new ArtFormType();
      return $this->render('base.html.twig');
    }
    //put your code here
}
