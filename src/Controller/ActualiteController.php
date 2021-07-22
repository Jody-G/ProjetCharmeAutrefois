<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Repository\ActualiteRepository;
use App\Repository\CategorieRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    /**
     * @Route("/actualite", name="actualite")
     */
    public function index(
        ActualiteRepository $actualiteRepository,
        PaginatorInterface $paginator,
        Request $request): Response
    {
        $data = $actualiteRepository->findAll();

        $actualites = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('actualite/index.html.twig', [
            'actualites' => $actualites,
        ]);
    }

    /**
     * @Route("/actualite/{slug}", name="actualite_show")
     */
    public function show(Actualite $actualite): Response
    {
        return $this->render('actualite/show.html.twig', [
            'actualite' => $actualite
        ]);
    }
}
