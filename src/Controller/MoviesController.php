<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieFormType;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MoviesController extends AbstractController
{
    private $movieRepository;
    public function __construct(MovieRepository $movieRepository){
        $this->movieRepository = $movieRepository;
    }

    #[Route('/movies/create', name: 'create_movie')]
    public function createMovie(Request $request): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieFormType::class, $movie);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newMovie = $form->getData();

            $imagePath = $form->get('imagePath')->getData();
        }

        return $this->render('movies/create.html.twig', ['form' => $form->createView(), 'movie'=> $movie]);
    }

    #[Route('/movies', name: 'movies', methods: ['GET'])]
    public function index(): Response
    {
        $movies = $this->movieRepository->findAll();
        return $this->render('movies/index.html.twig', ['movies' => $movies]);
    }

    #[Route('/movies/{id}', name: 'show_movie', methods: ['GET'])]
    public function show($id): Response
    {
        $movie = $this->movieRepository->find($id);
        return $this->render('movies/show.html.twig', ['movie' => $movie]);
    }
}

