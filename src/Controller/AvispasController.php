<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Avispas;

class AvispasController extends AbstractController
{
    /**
     * @Route("/avispas", name="avispas")
     */
    public function index()
    {

    	$gestor = $this -> getDoctrine() -> getManager();

    	$avispa = new Avispas();
    	$avispa -> setNombre('Africana');
    	$avispa -> setEntorno('África');
    	$avispa -> setColor('amarillo y negro');
    	$avispa -> setVenenosa(true);

    	$gestor -> persist($avispa);

    	$gestor -> flush();

        return $this->render('avispas/index.html.twig', [
            'controller_name' => 'AvispasController',
            'resultado' => 'Nueva avispa: ' . $avispa -> getId()
        ]);
    }


    /**
     * @Route("/avispas/{id}", name="mostrar_avispa")
     */
    public function mostrar($id){

    	$avispa = $this -> getDoctrine()
    		-> getRepository(Avispas::class)
    		-> find($id);

    	if( !$avispa ){

    		//throw $this -> createNotFoundException( 'no hay avispa con la id ' . $id );
    		$arr_local = [ 'Error' => 'No hay avispa con la id ' . $id ];
    		
    	} else {

	    	$arr_local = [
	    		'nombre' => $avispa -> getNombre(),
	    		'entorno' => $avispa -> getEntorno()
	    	];
	    }

    	return $this -> render('avispas/mostrar.html.twig', ['avispa' => $arr_local]);
    }
}
