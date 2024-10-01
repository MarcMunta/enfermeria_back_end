<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NurseController extends AbstractController
{
    #[Route('/lista_enfermeros', name: 'app_nurse')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/NurseController.php',
        ]);
    }

    public function importarJson($ruta){

        $jsonData = file_get_contents($ruta);
        $data = json_decode($jsonData, true);

        var_dump($data);

    }



}


 
