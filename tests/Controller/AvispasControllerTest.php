<?php

namespace App\Tests\Controller;

use App\Controller\AvispasController;
use App\Entity\Avispas;
//use PHPUnit\Framework\TestCase;

// Necesario definir la var KERNEL_CLASS en phpunit.xml.dist
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AvispasControllerTest extends WebTestCase {

	//public static $controlador;

	public function setUp(){

		$this -> controlador = new AvispasController();
	}

	public function test_index(){
		
		$cliente = static::createClient();

		$rondador = $cliente -> request('GET', '/avispas');

		//print_r($rondador);

		$this -> assertEquals( 200, $cliente -> getResponse() -> getStatusCode() );

		$res = $cliente -> getResponse() -> getContent();
		//$this -> assertEquals( 200, $res );
	}


	public function test_avispas_json(){
				
		$cliente = static::createClient();

		$rondador = $cliente -> request('GET', '/avispas/avispas_json');

		$res = $cliente -> getResponse() -> getContent();

		$this -> assertSame( 42, $res, 'Debería ser 42 como entero.' );
	}
}