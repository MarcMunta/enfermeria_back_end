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
        return $this->json(self::$enfermeros);
    }
    

    #[Route('/nursebyname', name: 'app_nurse', methods: ['GET'])]
    public function nursebyname(Request $request): JsonResponse
    {   

        $length_enfermeros = count(self::$enfermeros);

        for ($i = 0; $i < $length_enfermeros; $i++) {
            if (self::$enfermeros[$i][0] == $request->get("user") && self::$enfermeros[$i][1] == $request->get("pass")) {

                return new JsonResponse(true);
            }
        }

        return new JsonResponse(false);
    }

}


 
