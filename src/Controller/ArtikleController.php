<?php

namespace App\Controller;

use App\Entity\Artikle;
use App\Form\ArtikleType;
use App\Repository\ArtikleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/artikle")
 */
class ArtikleController extends AbstractController
{
    /**
     * @Route("/", name="artikle_index", methods={"GET"})
     */
    public function index(ArtikleRepository $artikleRepository): Response
    {
        return $this->render('artikle/index.html.twig', [
            'artikles' => $artikleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="artikle_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $artikle = new Artikle();
        $form = $this->createForm(ArtikleType::class, $artikle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($artikle);
            $entityManager->flush();

            return $this->redirectToRoute('artikle_index');
        }

        return $this->render('artikle/new.html.twig', [
            'artikle' => $artikle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="artikle_show", methods={"GET"})
     */
    public function show(Artikle $artikle): Response
    {
        return $this->render('artikle/show.html.twig', [
            'artikle' => $artikle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="artikle_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Artikle $artikle): Response
    {
        $form = $this->createForm(ArtikleType::class, $artikle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artikle_index');
        }

        return $this->render('artikle/edit.html.twig', [
            'artikle' => $artikle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="artikle_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Artikle $artikle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$artikle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($artikle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('artikle_index');
    }
}
