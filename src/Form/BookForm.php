<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

// It is recommended to isolate the complex forms from the controller since the framework does not want a lot of logic in controllers.

class BookForm extends AbstractType{

	public function buildForm(FormBuilderInterface $builder, array $options){
		$builder
			->add('author',TextType::class)
			->add('title',TextType::class)
			->add('datePublish',DateType::class)
			->add('date',DateType::class)
			->add('dateLastEdit',DateType::class)
			->add('save',SubmitType::class,['label' =>'Create book'])
		;
	}

	// configureOptions allows to know which form type class your field is (for example datetime will give a date and time to choose)

	public function configureOptions(OptionsResolver $resolver){
		$resolver -> setDefaults([
			'date_class'=> Taches::class,
		]);
	}
}
