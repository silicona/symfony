<?php

namespace App\Tests\Helper;

use App\Helper\Calculadora;
use PHPUnit\Framework\TestCase;

class CalculadoraTest extends TestCase {

	public function test_sumar(){

		$calculadora = new Calculadora();

		$resultado = $calculadora -> sumar(30, 12);

		$this -> assertSame( 42, $resultado, 'Debería ser 42 como entero.' );
	}
}

?>