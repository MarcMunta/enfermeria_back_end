<?php

namespace App\Entity;

use App\Repository\ListaEnfermerosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListaEnfermerosRepository::class)]
class ListaEnfermeros
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 9)]
    private ?string $DNI = null;

    #[ORM\Column(length: 45)]
    private ?string $NOMBRE = null;

    #[ORM\Column(length: 45)]
    private ?string $APELLIDO = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?LoginEnfermeros $ID_LOGIN = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDNI(): ?string
    {
        return $this->DNI;
    }

    public function setDNI(string $DNI): static
    {
        $this->DNI = $DNI;

        return $this;
    }

    public function getNOMBRE(): ?string
    {
        return $this->NOMBRE;
    }

    public function setNOMBRE(string $NOMBRE): static
    {
        $this->NOMBRE = $NOMBRE;

        return $this;
    }

    public function getAPELLIDO(): ?string
    {
        return $this->APELLIDO;
    }

    public function setAPELLIDO(string $APELLIDO): static
    {
        $this->APELLIDO = $APELLIDO;

        return $this;
    }

    public function getIDLOGIN(): ?LoginEnfermeros
    {
        return $this->ID_LOGIN;
    }

    public function setIDLOGIN(LoginEnfermeros $ID_LOGIN): static
    {
        $this->ID_LOGIN = $ID_LOGIN;

        return $this;
    }
}
