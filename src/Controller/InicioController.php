<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

        $locales = array(
        	'titulo' => 'Inicio',
        	'numero' => $numero
        );

        return $this -> render('inicio.html.twig', $locales);
    }
}


?>