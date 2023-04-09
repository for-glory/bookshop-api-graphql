<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/** A book. */
#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource]
class Book
{
    /** The ID of this book. */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /** The ISBN of this book (or null if doesn't have one). */
    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Isbn]
    private ?string $isbn = null;

    /** The title of this book. */
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $title = null;

    /** The summary of this book. */
    #[ORM\Column(type: Types::TEXT)]
    private ?string $summary = null;

    /** The price of this book. */
    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Assert\PositiveOrZero]
    private ?string $price = null;

    /** The author of this book. */
    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    private ?Author $author = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

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

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }
}
