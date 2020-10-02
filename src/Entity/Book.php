<?php

namespace App\Entity;

class Book{

	protected $author;
	protected $title;
	protected $datePublish;
	protected $date;
	protected $dateLastEdit;

	// GET and SET to retrieve the informations from the form


	// GET
	public function getAuthor(){
		return $this -> author;
	}

	public function getTitle(){
		return $this -> title;
	}

	public function getDatePublish(){
		return $this -> datePublish;
	}

	public function getDate(){
		return $this -> date;
	}

	public function getDateLastEdit(){
		return $this -> dateLastEdit;
	}

	//SET

	public function setAuthor($author){
		$this ->author = $author;
	}

	public function setTitle($title){
		$this ->title = $title;
	}

	public function setDatePublish($datePublish){
		$this ->datePublish = $datePublish;
	}

	public function setDate($date){
		$this ->date = $date;
	}

	public function setDateLastEdit($dateLastEdit){
		$this->dateLastEdit = $dateLastEdit;
	}
}