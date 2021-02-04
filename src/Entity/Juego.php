<?php

namespace App\Entity;

use App\Repository\JuegoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JuegoRepository::class)
 */
class Juego
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $foto;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="juegos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity=Estadistica::class, mappedBy="juego")
     */
    private $estadisticas;

    public function __construct()
    {
        $this->estadisticas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * @return Collection|Estadistica[]
     */
    public function getEstadisticas(): Collection
    {
        return $this->estadisticas;
    }

    public function addEstadistica(Estadistica $estadistica): self
    {
        if (!$this->estadisticas->contains($estadistica)) {
            $this->estadisticas[] = $estadistica;
            $estadistica->setJuego($this);
        }

        return $this;
    }

    public function removeEstadistica(Estadistica $estadistica): self
    {
        if ($this->estadisticas->removeElement($estadistica)) {
            // set the owning side to null (unless already changed)
            if ($estadistica->getJuego() === $this) {
                $estadistica->setJuego(null);
            }
        }

        return $this;
    }
}
