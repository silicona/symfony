<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

use App\Entity\Avispas;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormAvispa extends AbstractType{
	
	public function buildForm(FormBuilderInterface $creador, array $options){

		$creador
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
    		-> add('Guardar', SubmitType::class);
	}


	public function configureOptions(OptionsResolver $resolver){

		$resolver -> setDefaults([
			'data_class' => Avispas::class,
		]);
	}
}

?>