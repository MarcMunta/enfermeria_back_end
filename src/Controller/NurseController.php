<?php

namespace App\Controller;

use App\Entity\Nurses;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

class NurseController extends AbstractController
{
    

    #[Route('/list_of_nurses', name: 'nurse')]
    public function list_of_nurses(EntityManagerInterface $entityManager): JsonResponse
    {


        $enfermeroRepository = $entityManager->getRepository(Nurses::class);

        $enfermeros = $enfermeroRepository->findall();

        if (!empty($enfermeros)) {
            $resultado =  [];
            foreach ($enfermeros as $enfermero){
                $resultado[] = 'Dni: '. $enfermero->getDNI(). ' | '. 'Nombre: ' .$enfermero->getNombre() . ' | ' . 'Apellido: ' .$enfermero->getApellido();
            }

            return new JsonResponse('Enfermeros encontrados: ' . implode(' , ', $resultado));

        } else {
            return new JsonResponse('No se encontró ningún enfermero.');
        }
    }


  #[Route('/searchByName/{nombre}', name: 'app_nurse', methods: ['GET'])]
    public function searchByName(EntityManagerInterface $entityManager, String $nombre): JsonResponse
    {


        $enfermeroRepository = $entityManager->getRepository(Nurses::class);

        $enfermeros = $enfermeroRepository->findBy(array(
            'Nombre' => $nombre
        ));

        if (!empty($enfermeros)) {
            $resultado =  [];
            foreach ($enfermeros as $enfermero){
                $resultado[] = $enfermero->getNombre() . ' ' . $enfermero->getApellido();
            }

            return new JsonResponse('Enfermeros encontrados: ' . implode(' | ', $resultado));

        } else {
            return new JsonResponse('No se encontró ningún enfermero.');
        }
    }

  /*
    public static $enfermeros = array(

        array("Pepe54", "1234wsd", "Pepe"),
        array("Pepe55", "1234wsd", "Pepe"),
        array("PacoPlanchas", "patata", "Paco"),
        array("PepitaLoca", "firulay", "Pepita"),
        array("BenitoElGuay", "austrolopitecus", "Benito")

    );

   /*  #[Route('/list_of_nurses', name: 'nurse')]
    public function index(): JsonResponse
    {
        return $this->json(self::$enfermeros);
    } */


    /* #[Route('/nurselogin', name: 'app_nurse_login', methods: ['POST'])]
    public function nurselogin(Request $request): JsonResponse
    {

        $length_enfermeros = count(self::$enfermeros);

        for ($i = 0; $i < $length_enfermeros; $i++) {
            if (self::$enfermeros[$i][0] == $request->get("user") && self::$enfermeros[$i][1] == $request->get("pass")) {

                return new JsonResponse(true, Response::HTTP_OK);
            }
        }

        return new JsonResponse(false, Response::HTTP_NOT_FOUND);
    }

  
    #[Route('/buscarpNombre/{nombre}', name: 'app_nurse', methods: ['GET'])]
    public function searchByName(Request $request): JsonResponse
    {

        $enfermerosTemp = [];
        $enfermeroSize = count(self::$enfermeros);

        for ($i = 0; $i < $enfermeroSize; $i++) {

            if(self::$enfermeros[$i][2] == $request->get("nombre")){

                array_push($enfermerosTemp, self::$enfermeros[$i][0]. " " . self::$enfermeros[$i][2]);
            }
        }

        return new JsonResponse($enfermerosTemp);
    }     
        */
}
