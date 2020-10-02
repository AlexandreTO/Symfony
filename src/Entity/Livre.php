<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 */
// GET and SET to retrieve the informations from the form
class Livre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="date")
     */
    private $datePublish;

    /**
     * @ORM\Column(type="date")
     */
    private $dateLastEdit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDatePublish(): ?\DateTimeInterface
    {
        return $this->datePublish;
    }

    public function setDatePublish(\DateTimeInterface $datePublish): self
    {
        $this->datePublish = $datePublish;

        return $this;
    }

    public function getDateLastEdit(): ?\DateTimeInterface
    {
        return $this->dateLastEdit;
    }

    public function setDateLastEdit(\DateTimeInterface $dateLastEdit): self
    {
        $this->dateLastEdit = $dateLastEdit;

        return $this;
    }
}
