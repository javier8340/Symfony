<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InicioController extends AbstractController
{
    /**
     * @Route("/inicio", name="inicio")
     */
    public function index(): Response
    {
        return new Response(json_encode(["hola"=>"hola"]), 200, ["Content-Type"=> "application/json"]);
//        return $this->render('inicio/index.html.twig', [
//            'controller_name' => 'InicioController',
//        ]);
    }
}
