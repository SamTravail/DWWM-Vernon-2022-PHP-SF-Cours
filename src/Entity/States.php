<?php

namespace App\Entity;

use App\Repository\StatesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatesRepository::class)]
class States
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 3)]
    private ?string $stateNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $stateLabel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStateNumber(): ?string
    {
        return $this->stateNumber;
    }

    public function setStateNumber(string $stateNumber): self
    {
        $this->stateNumber = $stateNumber;

        return $this;
    }

    public function getStateLabel(): ?string
    {
        return $this->stateLabel;
    }

    public function setStateLabel(string $stateLabel): self
    {
        $this->stateLabel = $stateLabel;

        return $this;
    }
}
