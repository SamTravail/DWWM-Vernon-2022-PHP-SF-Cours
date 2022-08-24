<?php

namespace App\Entity;

use App\Repository\ObservationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ObservationsRepository::class)]
class Observations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $obsDate = null;

    #[ORM\Column(length: 255)]
    private ?string $state = null;

    #[ORM\Column(length: 255)]
    private ?string $states = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObsDate(): ?\DateTimeInterface
    {
        return $this->obsDate;
    }

    public function setObsDate(\DateTimeInterface $obsDate): self
    {
        $this->obsDate = $obsDate;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getStates(): ?string
    {
        return $this->states;
    }

    public function setStates(string $states): self
    {
        $this->states = $states;

        return $this;
    }
}
