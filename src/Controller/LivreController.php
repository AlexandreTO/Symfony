<?php

namespace App\Controller;

use App\Entity\Livre;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class LivreController extends AbstractController{
	/**
	 * @Route("/list/",name="admin_book",methods={"GET"})
	 */

	// Fetch all the informations in the database to display them
	public function show(){
		$book = $this->getDoctrine()
			->getRepository(Livre::Class)
			->findAll();

		if(!$book){
			throw $this ->createNotFoundException('Pas de livre trouvé');
		}
		return $this->render('Book/list.html.twig',['book'=>$book]);
	}
}

