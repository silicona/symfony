<?php

namespace App\Tests\Controller;

use App\Controller\AvispasController;
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
	}


	public function test_avispas_json(){

		//$calculadora = new Calculadora();

		//$resultado = $calculadora -> sumar(30, 12);

		$res = $this -> controlador -> avispas_json();

		$this -> assertSame( 42, $res, 'Debería ser 42 como entero.' );
	}
}