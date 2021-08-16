<?php

namespace App\Entity;

use App\Repository\AdditionalDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdditionalDataRepository::class)
 */
class AdditionalData
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $review;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $FIO;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?User
    {
        return $this->username;
    }

    public function setUsername(?User $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(string $review): self
    {
        $this->review = $review;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getFIO(): ?string
    {
        return $this->FIO;
    }

    public function setFIO(string $FIO): self
    {
        $this->FIO = $FIO;

        return $this;
    }
}
