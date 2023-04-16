<?php

namespace App\Controller;

use App\Entity\Oeuvre;
use App\Form\OeuvreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


#[Route('/')]
class OeuvreController extends AbstractController
{
    #[Route('/', name: 'app_oeuvre_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $oeuvres = $entityManager
            ->getRepository(Oeuvre::class)
            ->findAll();

        return $this->render('oeuvre/index.html.twig', [
            'oeuvres' => $oeuvres,
        ]);
    }

    #[Route('/front', name: 'app_oeuvre_front', methods: ['GET'])]
    public function index1(EntityManagerInterface $entityManager): Response
    {
        $oeuvres = $entityManager
            ->getRepository(Oeuvre::class)
            ->findAll();

        return $this->render('oeuvre/index_front.html.twig', [
            'oeuvres' => $oeuvres,
        ]);
    }


    #[Route('/admin', name: 'admin', methods: ['GET', 'POST'])]
    public function indexAdmin(): Response
    {
        return $this->render('admin/index.html.twig');
    }


    #[Route('/new', name: 'app_oeuvre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $oeuvre = new Oeuvre();
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request); // On récupère le formulaire envoyé dans la requête

        if ($form->isSubmitted() && $form->isValid()) { // on véfifie si le formulaire est envoyé et si il est valide
            /** @var UploadedFile $uploadedFile */
            // Handle file upload
            $imageFile = $form->get('image')->getData();
            $destination = $this->getParameter('kernel.project_dir') . '/public/uploads';
            // $destination = $this->getParameter('kernel.project_dir').'/public/uploads/oeuvre_image';
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $destination,
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Handle exception
                }

                $oeuvre->setImage($newFilename);
            }

            $entityManager->persist($oeuvre); // on persiste
            $entityManager->flush(); //on save
            $this->addFlash('notice', 'Oeuvre a été bien ajouté !');

            return $this->redirectToRoute('app_oeuvre_front', [], Response::HTTP_SEE_OTHER);
            //redirectroute : yarjaalik lil page principale (refraiche autre facon)

        }

        return $this->renderForm('oeuvre/new.html.twig', [ // // on envoie ensuite le formulaire au template

            'oeuvre' => $oeuvre,
            'form' => $form,
        ]);
    }


    #[Route('/front/new', name: 'app_oeuvre', methods: ['GET', 'POST'])]
    public function new1(Request $request, EntityManagerInterface $entityManager): Response
    {
        $oeuvre = new Oeuvre();
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request); // On récupère le formulaire envoyé dans la requête

        if ($form->isSubmitted() && $form->isValid()) { // on véfifie si le formulaire est envoyé et si il est valide
            /** @var UploadedFile $uploadedFile */
            // Handle file upload
            $imageFile = $form->get('image')->getData();
            $destination = $this->getParameter('kernel.project_dir') . '/public/uploads';
            // $destination = $this->getParameter('kernel.project_dir').'/public/uploads/oeuvre_image';
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $destination,
                        $newFilename
                    );
                } catch (FileException $e) {
                    // Handle exception
                }

                $oeuvre->setImage($newFilename);
            }

            $entityManager->persist($oeuvre); // on persiste
            $entityManager->flush(); //on save

            return $this->redirectToRoute('app_oeuvre_front', [], Response::HTTP_SEE_OTHER);
            //redirectroute : yarjaalik lil page principale (refraiche autre facon)

        }

        return $this->renderForm('oeuvre/_formfront.html.twig', [ // // on envoie ensuite le formulaire au template

            'oeuvre' => $oeuvre,
            'form' => $form,
        ]);
    }

    #[Route('/back/{id}', name: 'app_oeuvre_show', methods: ['GET'])]
    public function show(Oeuvre $oeuvre): Response
    {
        return $this->render('oeuvre/show.html.twig', [
            'oeuvre' => $oeuvre,
        ]);
    }

    #[Route('/{id}', name: 'app_oeuvre_show', methods: ['GET'])]
    public function show_front(Oeuvre $oeuvre): Response
    {
        return $this->render('oeuvre/show_front.html.twig', [
            'oeuvre' => $oeuvre,
        ]);
    }


    #[Route('/{id}/edit', name: 'app_oeuvre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Oeuvre $oeuvre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->flush();

            return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oeuvre/edit.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_oeuvre_delete', methods: ['POST'])]
    public function delete(Request $request, Oeuvre $oeuvre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $oeuvre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($oeuvre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
    }
}
