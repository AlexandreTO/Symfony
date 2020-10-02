<?php

namespace App\Controller;

use App\Entity\Livre;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class DeleteController extends AbstractController{
	/**
	 * @Route("/delete/{id}", name="delete_book",methods={"GET"})

	 */

	// Delete the entry in the database when pressing the button
	public function delete($id){
		$entityManager = $this -> getDoctrine()->getManager();
		$book = $entityManager->getRepository(Livre::class)->find($id);

		if(!$book){
			throw $this->createNotFoundException("No book found !");
		}

		$entityManager->remove($book);
		$entityManager->flush();

		return $this->redirectToRoute('admin_book');
	}
}