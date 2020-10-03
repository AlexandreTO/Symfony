<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\BookForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController{
	/**
	 * @Route("/edit/{id}", name="edit_book",methods={"GET","POST"})
	 */

	// Edit the entry in the database when pressing the button
	// To be able to edit the book, I made a form that retrieves the input from the database in a new form in order to 
	// edit the book. This allows me to edit the book and let it replace in the database

	public function edit(Livre $book, Request $request, EntityManagerInterface $em){
		$form = $this->createForm(BookForm::class, $book); // By putting $book as the second arguments, I retrieve all the informations on the book i want to edit

		$form->handleRequest($request);
		if ($form ->isSubmitted() && $form->isValid()){
			$book = $form->getData();
			$book -> setDateLastEdit(new \DateTime('now'));
			$em->persist($book);
			$em->flush();
			return $this->redirectToRoute('admin_book');
		}

		return $this->render('Book/edit.html.twig',
			['edit'=> $form->createView(),
		]);
	}
}