<?php

namespace App\Entity;

use App\Repository\NotificacionesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NotificacionesRepository::class)
 */
class Notificaciones
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
    private $prioridad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mensaje;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $sender;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="notificaciones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $receiver;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrioridad(): ?int
    {
        return $this->prioridad;
    }

    public function setPrioridad(int $prioridad): self
    {
        $this->prioridad = $prioridad;

        return $this;
    }

    public function getMensaje(): ?string
    {
        return $this->mensaje;
    }

    public function setMensaje(string $mensaje): self
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    public function getSender(): ?Usuario
    {
        return $this->sender;
    }

    public function setSender(?Usuario $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?Usuario
    {
        return $this->receiver;
    }

    public function setReceiver(?Usuario $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }
}
