<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

use App\Entity\Continente;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormContinente extends AbstractType {

	public function buildForm( FormBuilderInterface $creador, array $options ){

		$creador
			-> add('nombre', TextType::class)
			-> add('guardar', SubmitType::class);
	}


	public function configureOptions( OptionsResolver $resolver ){

		$resolver -> setDefaults([
			'data_class' => Continente::class
		]);
	}
}

?>