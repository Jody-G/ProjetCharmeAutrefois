<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Realisation;
use App\Repository\CategorieRepository;
use App\Repository\RealisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RealisationController extends AbstractController
{
    /**
     * @Route("/realisations/{id}", name="realisation")
     */
    public function index(int $id, RealisationRepository $realisationRepository): Response
    {
        $realisations = $this->getDoctrine()
            ->getRepository(Realisation::class)
            ->findBy(['categorie' => $id]);

        return $this->render('realisation/index.html.twig', [
            'realisations' => $realisations,
            'categorie' => $id
        ]);
    }

    /**
     * @Route("/realisation/{slug}", name="realisation_show")
     */
    public function show(Realisation $realisation): Response
    {
        return $this->render('realisation/show.html.twig', [
            'realisation' => $realisation
        ]);
    }

    // public function index(int $id, CategorieRepository $categorieRepository): Response
    // {
    //     $realisations = $this->getDoctrine()
    //         ->getRepository(Realisation::class)
    //         ->findBy(['categorie' => $id]);

    //     return $this->render('realisation/index.html.twig', [
    //         'realisations' => $realisations,
    //         'categories' => $categorieRepository->findAll(),
    //     ]);
    // }
}
