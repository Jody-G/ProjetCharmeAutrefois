<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
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
}
