<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use App\Entity\Avispas;

class AjaxController extends AbstractController {

    /**
     * @Route("/ajax/", name = "inicio_ajax")
     */
    public function inicio() {

        $repo = $this -> getDoctrine() -> getRepository(Avispas::class);
        $avispas = $repo -> findAll();

        /*
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
        */

        return $this -> render('ajax/inicio.html.twig', ['avispas' => $avispas]);
    }

    /**
     * @Route("/ajax/recibir", name = "recibir_ajax", methods = {"POST"})
     */
    public function recibir(Request $request){

        if( $request -> isXmlHttpRequest() ){


            $codex = array( new JsonEncoder() );
            $nomalizador = array( new ObjectNormalizer() );
            $serializador = new Serializer($nomalizador, $codex);

            $id = $request -> request -> get('id');

            $repo = $this -> getDoctrine() -> getRepository(Avispas::class);
            $avispa = $repo -> findOneBy(['id' => $id]);
            $respuesta = new JsonResponse();
            $respuesta -> setStatusCode(200);

            if( $avispa ){

                $datos = array(
                    'status' => 'ok',
                    'mensaje' => $avispa,
                );
            
            } else {

                $datos = array(
                    'status' => 'ko',
                    //'error' => gettype($id)
                    'error' => 'No existe la avispa en cuestión.'
                );
            }
            
            $respuesta -> setData( $serializador -> serialize($datos, 'json') );

            return $respuesta;
        }


    }
}


?>