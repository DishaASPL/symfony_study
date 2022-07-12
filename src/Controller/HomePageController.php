<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use PharIo\Manifest\Requirement;

class HomePageController extends AbstractController
{
    #[Route('/',name: 'home_page')]
    public function index(
        ): Response {

            $title = "Welcome to Nettivene";
            return $this->render('home_page/index.html.twig', [
                'title' => $title,
            ]);
    }

    #[Route(
    '/boat/{id}', methods: ['GET'],
    condition: "params['id'] < 200", priority : 1
    )]
    public function getId(int $id
        ): Response {

            return $this->render('home_page/index.html.twig', [
                'title' => "Your Boat ID is".$id,
            ]);
    }


    #[Route(
    '/boat/{category}',
        name: 'ad_by_categoryName',
        requirements: ['category' => '[a-zA-Z-]+'],
        priority : 2
        )]
        public function getCategoryName($category
        ): Response {

            return $this->render('home_page/index.html.twig', [
                'title' => "Your Boat Category is ".$category,
            ]);
    }

    #[Route('/boat/{page}', name: 'boat_default', defaults: ['page' => 1, 'title' => 'please pass your Boat ID or Name!'])]
    public function default(int $page, string $title): Response
    {
        return $this->render('home_page/index.html.twig', [
            'title' => $title,
        ]);
    }

    #[Route('/boat/{token}', name: 'escapeSlash', requirements: ['token' => '.+'])]
    public function escapeSlash($token): Response
    {
        return $this->render('home_page/index.html.twig', [
            'title' => $token,
        ]);
    }

}
