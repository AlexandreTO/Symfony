<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Form\Forms; // Importation des formulaires pour Symfony

// $formFactory = Forms::createFormFactory(); 
class Form extends AbstractController{

	/**
	 * @Route("/form/new")
	*/
	public function new(Request $request){
		$book = new Book();
		// Creation of the form
		$form = $this->createForm(BookForm::class,$book);
		$form ->handleRequest($request);
		if ($form ->isSubmitted() && $form->isValid()) {
			// If all the fields have been filled with valid options 
			$task = $form ->getData();

			// to visualize the output
			dump($book);
		}

		// Rendering the form
		return $this->render('Book/new.html.twig',['form'=> $form->createView(),
		]);

	}


}

