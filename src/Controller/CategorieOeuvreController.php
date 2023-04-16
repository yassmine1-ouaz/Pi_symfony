<?php

namespace App\Controller;

use App\Entity\CategorieOeuvre;
use App\Form\CategorieOeuvreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie')]
class CategorieOeuvreController extends AbstractController
{
    #[Route('/', name: 'app_categorie_oeuvre_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $categorieOeuvres = $entityManager
            ->getRepository(CategorieOeuvre::class)
            ->findAll();

        return $this->render('categorie_oeuvre/index.html.twig', [
            'categorie_oeuvres' => $categorieOeuvres,
        ]);
    }

    #[Route('/new', name: 'app_categorie_oeuvre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $categorieOeuvre = new CategorieOeuvre();
        $form = $this->createForm(CategorieOeuvreType::class, $categorieOeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($categorieOeuvre);
            $entityManager->flush();

            return $this->redirectToRoute('app_categorie_oeuvre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie_oeuvre/new.html.twig', [
            'categorie_oeuvre' => $categorieOeuvre,
            'form' => $form,
        ]);
    }

    #[Route('/{idCatOeuv}', name: 'app_categorie_oeuvre_show', methods: ['GET'])]
    public function show(CategorieOeuvre $categorieOeuvre): Response
    {
        return $this->render('categorie_oeuvre/show.html.twig', [
            'categorie_oeuvre' => $categorieOeuvre,
        ]);
    }

    #[Route('/{idCatOeuv}/edit', name: 'app_categorie_oeuvre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategorieOeuvre $categorieOeuvre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategorieOeuvreType::class, $categorieOeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_categorie_oeuvre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie_oeuvre/edit.html.twig', [
            'categorie_oeuvre' => $categorieOeuvre,
            'form' => $form,
        ]);
    }

    #[Route('/{idCatOeuv}', name: 'app_categorie_oeuvre_delete', methods: ['POST'])]
    public function delete(Request $request, CategorieOeuvre $categorieOeuvre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $categorieOeuvre->getIdCatOeuv(), $request->request->get('_token'))) {
            $entityManager->remove($categorieOeuvre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_categorie_oeuvre_index', [], Response::HTTP_SEE_OTHER);
    }
}
