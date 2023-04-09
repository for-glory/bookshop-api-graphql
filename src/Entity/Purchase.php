<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PurchaseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/** A purchase. */
#[ORM\Entity(repositoryClass: PurchaseRepository::class)]
#[ApiResource]
class Purchase
{
    /** The ID of this purchase. */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /** The date time at which this purchase was made. */
    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE)]
    private ?\DateTimeImmutable $purchaseDate = null;

    /** The customer who made this purchase. */
    #[ORM\ManyToOne(inversedBy: 'purchases')]
    private ?Customer $customer = null;

    /** The book that was purchased. */
    #[ORM\ManyToOne]
    private ?Book $book = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPurchaseDate(): ?\DateTimeImmutable
    {
        return $this->purchaseDate;
    }

    public function setPurchaseDate(\DateTimeImmutable $purchaseDate): self
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }
}
