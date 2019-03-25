<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

// use Symfony\Component\Validator\Constraints\NotBlank;
// use Symfony\Component\Validator\Constraints\Type;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Avispas;
use App\Entity\Continente;

use App\Form\FormAvispa;
use App\Form\FormContinente;

class AvispasController extends AbstractController {


    /**
     * @Route("/avispas", name="avispas")
     */
    public function index(){


        $avispas = $this -> getDoctrine() -> getRepository(Avispas::class) -> findAll();

        $continentes = $this -> getDoctrine() -> getRepository(Continente::class) -> findAll();

        return $this -> render('avispas/index.html.twig', [ 
            'controller_name' => 'AvispasController',
        	'avispas' => $avispas,
            'continentes' => $continentes,
        ]);
    }


    public function index_old(){

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
    public function editar($id, Request $request){

        $avispa = $this -> getDoctrine()
                    -> getRepository(Avispas::class)
                    -> find($id);

        $form = $this -> createForm(FormAvispa::class, $avispa);

        $form -> handleRequest($request);

        if( $form -> isSubmitted() && $form -> isValid() ){

            $data = $form -> getData();
            
            $gestor = $this -> getDoctrine() -> getManager();

            //$avispa = new Avispas();
            $avispa -> setNombre($data -> getNombre());
            $avispa -> setEntorno($data -> getEntorno());
            $avispa -> setColor($data -> getColor());
            $avispa -> setVenenosa($data -> getVenenosa());

            $gestor -> persist($avispa);

            $gestor -> flush();

            return $this -> redirectToRoute('avispas');
        }

        return $this -> render('avispas/editar.html.twig', [
            'form' => $form -> createView()
        ]);
    }

    /**
     * @Route("/avispas/borrar/{id}", name = "borrar_avispa")
     */
    public function borrar($id){

        $gestor = $this -> getDoctrine() -> getManager();

        $avispa = $gestor -> getRepository(Avispas::class) -> find($id);

        if( !$avispa ){

            throw $this -> createNotFoundException( 'No existe para la avispa ' . $id );
        }

        $gestor -> remove($avispa);

        $gestor -> flush();

        return $this -> redirectToRoute('avispas');
    }


    /**
     *@Route("/avispas/nuevo", name ="crear_avispa")
     */
    public function nuevo(Request $request){

        $avispa = new Avispas();


        $form = $this -> createForm(FormAvispa::class);
        // $form = $this -> createForm(FormAvispa::class, $avispa);

    	$form -> handleRequest($request);

    	if( $form -> isSubmitted() && $form -> isValid() ){

    		$data = $form -> getData();
			
			$gestor = $this -> getDoctrine() -> getManager();

	    	//$avispa = new Avispas();
	    	$avispa -> setNombre($data -> getNombre());
	    	$avispa -> setEntorno($data -> getEntorno());
	    	$avispa -> setColor($data -> getColor());
            $avispa -> setVenenosa($data -> getVenenosa());

            $continente = $this -> getDoctrine() -> getRepository(Continente::class) -> find($data -> getContinente());
            //var_dump($continente);

            //$avispa -> setContinente($continente);
	    	$avispa -> setContinente($data -> getContinente());

	    	$gestor -> persist($avispa);

	    	$gestor -> flush();

    		return $this -> redirectToRoute('avispas');
    	}
        
        return $this -> render('avispas/nuevo.html.twig', [
            'form' => $form -> createView()
        ]);

    }


    /**
     * @Route("avispas/nuevo-continente", name = "crear_continente")
     */
    public function nuevo_continente(Request $request){

        $form = $this -> createForm(FormContinente::class);

        $form -> handleRequest($request);

        if( $form -> isSubmitted() && $form -> isValid() ){

            $datos = $form -> getData();

            $continente = new Continente();

            $gestor = $this -> getDoctrine() -> getManager();

            $continente -> setNombre( $datos -> getNombre() );

            $gestor -> persist($continente);

            $gestor -> flush();

            return $this -> redirectToRoute('avispas');
        }

        return $this -> render('continente/nuevo.html.twig', [
            'form' => $form -> createView(),
        ]);
    }


    /**
     * @Route("/avispas/avispas_json", name="avispas_json")
     */
    public function avispas_json(){

        $repositorio = $this -> getDoctrine() -> getRepository(Avispas::class);

        $avispas = $repositorio -> findAll();

        var_dump($avispas);

        //return $avispas;
        return new JsonResponse($avispas);
    }
}
