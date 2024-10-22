<?php

namespace App\Entity;

use App\Repository\LoginEnfermerosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoginEnfermerosRepository::class)]
class LoginEnfermeros
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $USUARIO = null;

    #[ORM\Column(length: 45)]
    private ?string $CONTRASENA = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUSUARIO(): ?string
    {
        return $this->USUARIO;
    }

    public function setUSUARIO(string $USUARIO): static
    {
        $this->USUARIO = $USUARIO;

        return $this;
    }

    public function getCONTRASENA(): ?string
    {
        return $this->CONTRASENA;
    }

    public function setCONTRASENA(string $CONTRASENA): static
    {
        $this->CONTRASENA = $CONTRASENA;

        return $this;
    }
}
