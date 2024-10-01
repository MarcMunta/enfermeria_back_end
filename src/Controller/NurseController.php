<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class NurseController extends AbstractController
{

    public static $enfermeros = array(
        array("Pepe", "1234wsd"),
        array("Paco", "patata"),
        array("Pepita", "firulay"),
        array("Benito", "austrolopitecus")
    );

    #[Route('/lista_enfermeros', name: 'app_nurse')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/NurseController.php',
        ]);
    }


}


 
