<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Form\BookForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LivreController extends AbstractController{
	/**
	 * @Route("/",name="homepage",methods={"GET"})
	 */

	// Fetch all the informations in the database to display them
	public function show(){
		$book = $this->getDoctrine()
			->getRepository(Livre::Class)
			->findAll();

		if(!$book){
			$this->addFlash('info','No book stored !');
			return $this->render('base.html.twig');
		}
		return $this->render('Book/list.html.twig',['book'=>$book]);
	}

		/**
	 * @Route("/edit/{id}", name="edit_book",methods={"GET","POST"})
	 */

	// Edit the entry in the database when pressing the button
	// To be able to edit the book, I made a form that retrieves the input from the database in a new form in order to 
	// edit the book. This allows me to edit the book and let it replace in the database

	public function edit(Livre $book, Request $request, EntityManagerInterface $em){

		$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
		$form = $this->createForm(BookForm::class, $book); // By putting $book as the second arguments, I retrieve all the informations on the book i want to edit

		$form->handleRequest($request);
		if ($form ->isSubmitted() && $form->isValid()){
			$book = $form->getData();
			$book -> setDateLastEdit(new \DateTime('now'));
			$em->persist($book);
			$em->flush();
			$this->addFlash('success','Book edited !');
			return $this->redirectToRoute('homepage');
		}

		return $this->render('Book/edit.html.twig',
			['edit'=> $form->createView(),
		]);

	}

	/**
	 * @Route("/delete/{id}", name="delete_book",methods={"GET"})

	 */

	// Delete the entry in the database when pressing the button Delete
	public function delete($id){

		$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
		$entityManager = $this -> getDoctrine()->getManager();
		$book = $entityManager->getRepository(Livre::class)->find($id);

		if(!$book){
			return $this->redirectToRoute('homepage');
		}

		$this->addFlash('success','Book deleted !');
		$entityManager->remove($book);
		$entityManager->flush();

		return $this->redirectToRoute('homepage');
	}

}

