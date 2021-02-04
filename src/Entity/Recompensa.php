<?php

namespace App\Entity;

use App\Repository\RecompensaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecompensaRepository::class)
 */
class Recompensa
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nivel;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $recompensa;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $tipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNivel(): ?int
    {
        return $this->nivel;
    }

    public function setNivel(int $nivel): self
    {
        $this->nivel = $nivel;

        return $this;
    }

    public function getRecompensa(): ?string
    {
        return $this->recompensa;
    }

    public function setRecompensa(string $recompensa): self
    {
        $this->recompensa = $recompensa;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }
}
