<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

use Symfony\Component\HttpFoundation\JsonResponse;

use App\Entity\Avispas;

class AvispasController extends AbstractController
{


    /**
     * @Route("/avispas", name="avispas")
     */
    public function index()
    {
    	/*
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
        */

        $repositorio = $this -> getDoctrine() -> getRepository(Avispas::class);

        $avispas = $repositorio -> findAll();

        return $this -> render('avispas/index.html.twig', [ 
            'controller_name' => 'AvispasController',
        	'avispas' => $avispas 
        ]);
    }


    //@Route("/avispas/{id}", name="mostrar_avispa", requirements = {"id" = "\d+"})
    /**
     * @Route("/avispas/{id<\d+>}", name="mostrar_avispa")
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

    /**
     *@Route("/avispas/editar/{id}", name = "editar_avispa")
     */
    public function editar($id){

    }


    /**
     *@Route("/avispas/nuevo", name ="crear_avispa")
     */
    public function nuevo(Request $request){

    	$form = $this -> createFormBuilder(null, [
    		'action' => 'nuevo'
    	])
    		-> add('nombre', Texttype::class, [
    			'constraints' => new notBlank()
    		])
    		-> add('entorno', TextType::class)
    		-> add('color', TextType::class, [
    			'label' => 'Etiqueta de Color'
    		])
    		-> add('venenosa', ChoiceType::class, [
    			'choices' => ['si' => 1, 'no' => 0],
    			'choice_label' => function($valor, $clave, $valorEleccion){

    				return ucfirst($clave);
    			},
    			'label' => '¿Tiene veneno?',
    			'expanded' => true
    		])
    		-> getForm();

    	$form -> handleRequest($request);

    	if( $form -> isSubmitted() && $form -> isValid() ){

    		$data = $form -> getData();
			
			$gestor = $this -> getDoctrine() -> getManager();

	    	$avispa = new Avispas();
	    	$avispa -> setNombre($data['nombre']);
	    	$avispa -> setEntorno($data['entorno']);
	    	$avispa -> setColor($data['color']);
	    	$avispa -> setVenenosa($data['venenosa']);

	    	$gestor -> persist($avispa);

	    	$gestor -> flush();


    		return $this -> redirectToRoute('avispas');
    	}

		return $this -> render('avispas/nuevo.html.twig', [
			'form' => $form -> createView()
		]);

    }


    /**
     * @Route("/avispas/avispas_json", name="avispas_json")
     */
    public function avispas_json(){

        $repositorio = $this -> getDoctrine() -> getRepository(Avispas::class);

        $avispas = $repositorio -> findAll();

        return new JsonResponse($avispas);
    }
}
