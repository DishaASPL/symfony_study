<?php

namespace Nettivene\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Nettivene\Service\MovieDetail\MovieDetails;

class ExploreController extends AbstractController
{
    #[Route(
    '/explore',
    name: 'app_explore'
     )]
    public function index(MovieDetails $movieDetail
        ): Response{
            $title = $movieDetail->getHomepageTitle();
            return $this->render('explore/index.html.twig', [
                'title' => $title,
            ]);
    }

    #[Route(
    '/explore/{name}',
    name: 'app_name',
    requirements: ['name' => '[a-zA-Z-]+'],
    )]
    public function getMovieByName($name,MovieDetails $movieDetail
        ): Response {
            $movieData = $movieDetail->getMovieDeatils();
            return $this->render('explore/index.html.twig', [
                'movie_data' => $movieData,
            ]);
    }
}
