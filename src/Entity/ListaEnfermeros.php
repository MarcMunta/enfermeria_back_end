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

    #[ORM\Column]
    private ?int $DNI = null;

    #[ORM\Column(length: 45)]
    private ?string $nombre = null;

    #[ORM\Column(length: 45)]
    private ?string $apellido = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?LoginEnfermeros $login_enfermeros = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDNI(): ?int
    {
        return $this->DNI;
    }

    public function setDNI(int $DNI): static
    {
        $this->DNI = $DNI;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): static
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getLoginEnfermeros(): ?LoginEnfermeros
    {
        return $this->login_enfermeros;
    }

    public function setLoginEnfermeros(LoginEnfermeros $login_enfermeros): static
    {
        $this->login_enfermeros = $login_enfermeros;

        return $this;
    }
}
