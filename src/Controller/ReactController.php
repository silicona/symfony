<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ReactController extends AbstractController
{
    /**
     * @Route("/react", name="react")
     */
    public function index()
    {
        return $this->render('react/index.html.twig', [
            'controller_name' => 'ReactController',
        ]);

        
    }

    /**
     * @Route("/api/publico", name="publico")
     * @return JsonResponse
     */
    public function accion_publica(){

    	$datos = [
            [
                'albumId' => "1",
                "id" => 1,
                "title" => "Titulo 1",
                "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout"
            ],
            [
                'albumId' => "2",
                "id" => 2,
                "title" => "Titulo 2",
                "description" => "Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text"
            ],
            [
                'albumId' => "3",
                "id" => 3,
                "title" => "Titulo 3",
                "description" => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form"
            ],
    	];

    	return new JsonResponse($datos);
    }

    /**
     * @Route("/api/privado", name="privado")
     */
    public function accion_privada(){

    	$datos = [
            [
                'albumId' => "1",
                "id" => 1,
                "title" => "Título Privado 1",
                "description" => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout"
            ],
            [
                'albumId' => "2",
                "id" => 2,
                "title" => "Título Privado 2",
                "description" => "Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text"
            ],
            [
                'albumId' => "3",
                "id" => 3,
                "title" => "Título Privado 3",
                "description" => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form"
            ],
    	];

    	return new JsonResponse($datos);
    }
}
