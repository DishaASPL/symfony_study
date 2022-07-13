<?php

namespace Nettivene\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DeatailPageController extends AbstractController
{
    #[Route('/deatails', name: 'app_deatail_page')]
    public function index(): Response
    {

        return $this->render('deatail_page/index.html.twig', [
            'controller_name' => 'DeatailPageController',
        ]);
    }


    #[Route(
    '/deatails/{id<\d+>}',
    methods: ['GET'],
    name: 'app_deatail_page_id',
    )]
    public function getId(int $id, Request $request
        ): Response {
            if (in_array($id, [0])) {
                throw $this->createNotFoundException('The deatils ID does not exist');
            }

            $url = $this->generateUrl('app_deatail_page_id', ['id' => $id]);

            $route = $request->attributes->get('_route');

            return $this->redirectToRoute('app_deatail_page');
            return $this->render('deatail_page/index.html.twig', [
                'controller_name' => 'DeatailPageController',
            ]);
    }


    #[Route(
    '/deatails/{category}',
    name: 'ad_by_categoryName',
    requirements: ['category' => '[a-zA-Z-]+'],
    )]
    public function getCategoryName($category, LoggerInterface $logger
        ): Response {

            $logger->info('Category Name logging!'.$category);

            return $this->render('deatail_page/index.html.twig', [
                'controller_name' => 'DeatailPageController',
                'category' => $category,
            ]);
    }

    #[Route(
    '/deatails/{firstname}/{lastname}',
    name: 'demo_json',
    )]
    public function demoJason($firstname,$lastname): JsonResponse
    {
        // returns '{"username":"jane.doe"}' and sets the proper Content-Type header
        $jasonRes =  $this->json(['firstname' => $firstname,'lastname' => $lastname]);
        echo $jasonRes;exit;

    }


}
