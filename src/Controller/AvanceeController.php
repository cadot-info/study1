<?php

namespace App\Controller;

use App\Entity\Avancee;
use App\Form\AvanceeType;
use App\Repository\AvanceeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/avancee")
 */
class AvanceeController extends AbstractController
{
    /**
     * @Route("/", name="avancee_index", methods={"GET"})
     */
    public function index(AvanceeRepository $avanceeRepository): Response
    {
        return $this->render('avancee/index.html.twig', [
            'avancees' => $avanceeRepository->findAll(),
            'menu' => 'avancee'
        ]);
    }

    /**
     * @Route("/new", name="avancee_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $avancee = new Avancee();
        $form = $this->createForm(AvanceeType::class, $avancee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($avancee);
            $entityManager->flush();

            return $this->redirectToRoute('avancee_index');
        }

        return $this->render('avancee/new.html.twig', [
            'avancee' => $avancee,
            'form' => $form->createView(),
            'menu' => 'avancee'
        ]);
    }

    /**
     * @Route("/{id}", name="avancee_show", methods={"GET"})
     */
    public function show(Avancee $avancee): Response
    {
        return $this->render('avancee/show.html.twig', [
            'avancee' => $avancee,
            'menu' => 'avancee'
        ]);
    }

    /**
     * @Route("/{id}/edit", name="avancee_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Avancee $avancee): Response
    {
        $form = $this->createForm(AvanceeType::class, $avancee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('avancee_index');
        }

        return $this->render('avancee/edit.html.twig', [
            'avancee' => $avancee,
            'form' => $form->createView(),
            'menu' => 'avancee'
        ]);
    }

    /**
     * @Route("/{id}", name="avancee_delete", methods={"POST"})
     */
    public function delete(Request $request, Avancee $avancee): Response
    {
        if ($this->isCsrfTokenValid('delete' . $avancee->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($avancee);
            $entityManager->flush();
        }

        return $this->redirectToRoute('avancee_index');
    }
}
