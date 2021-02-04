<?php

namespace App\Entity;

use App\Repository\RecompensasObtenidasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecompensasObtenidasRepository::class)
 */
class RecompensasObtenidas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="recompensasObtenidas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity=Recompensa::class)
     */
    private $recompensa;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="datetime")
     */
    private $anterior;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getRecompensa(): ?Recompensa
    {
        return $this->recompensa;
    }

    public function setRecompensa(?Recompensa $recompensa): self
    {
        $this->recompensa = $recompensa;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getAnterior(): ?\DateTimeInterface
    {
        return $this->anterior;
    }

    public function setAnterior(\DateTimeInterface $anterior): self
    {
        $this->anterior = $anterior;

        return $this;
    }
}
