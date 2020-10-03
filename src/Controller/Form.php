<?php

namespace App\Controller;

use App\Entity\Livre;
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
	 * @Route("/",methods={"GET","POST"},name="homepage")
	*/
	public function new(Request $request)
	{
		$book = new Livre();
		// Creation of the form
		$form = $this->createForm(BookForm::class,$book);
		$form ->handleRequest($request);
		if ($form ->isSubmitted() && $form->isValid()) 
		{
			// If all the fields have been filled with valid options 
			//$task = $form ->getData();
			$entityManager = $this ->getDoctrine()->getManager();
			$book -> setDate(new \DateTime('now'));
			$book -> setDateLastEdit(new \DateTime('now'));
			$entityManager ->persist($book);
			$entityManager->flush();

			$this ->addFlash('success','Added');
			return $this->redirectToRoute('admin_book');
			// to visualize the output
			//dump($book);

		}

		// Rendering the form
		return $this->render('Book/form.html.twig',
			['form'=> $form->createView(),
		]);
	}

}

