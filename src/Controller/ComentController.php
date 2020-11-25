<?php

namespace App\Controller;

use App\Entity\Coment;
use App\Form\ComentType;
use App\Repository\ComentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/coment")
 */
class ComentController extends AbstractController
{
    /**
     * @Route("/", name="coment_index", methods={"GET"})
     */
    public function index(ComentRepository $comentRepository): Response
    {
        return $this->render('coment/index.html.twig', [
            'coments' => $comentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="coment_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $coment = new Coment();
        $form = $this->createForm(ComentType::class, $coment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($coment);
            $entityManager->flush();

            return $this->redirectToRoute('coment_index');
        }

        return $this->render('coment/new.html.twig', [
            'coment' => $coment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coment_show", methods={"GET"})
     */
    public function show(Coment $coment): Response
    {
        return $this->render('coment/show.html.twig', [
            'coment' => $coment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="coment_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Coment $coment): Response
    {
        $form = $this->createForm(ComentType::class, $coment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('coment_index');
        }

        return $this->render('coment/edit.html.twig', [
            'coment' => $coment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="coment_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Coment $coment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($coment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('coment_index');
    }
}
