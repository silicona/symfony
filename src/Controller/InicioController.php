<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Helper\Calculadora;

class InicioController extends AbstractController {

	/**
	 * @Route("/")
	 */
    public function inicio() {

        $numero = random_int(0, 100);

        /*
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
        */

        $calc = new Calculadora();

        $res = $calc -> sumar(2, 2);

        $locales = array(
        	'titulo' => 'Inicio',
        	'numero' => $res
        );

        return $this -> render('inicio.html.twig', $locales);
    }
}


?>