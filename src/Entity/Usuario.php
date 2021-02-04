<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /*
    * @ORM\Column(type = "datetime")
    */
    private $fechaRegistro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ipRegistro;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ultimoAcceso;

    /**
     * @ORM\Column(type="integer")
     */
    private $monedas;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    /**
     * @ORM\ManyToMany(targetEntity=Usuario::class)
     */
    private $amigos;

    /**
     * @ORM\OneToMany(targetEntity=Notificacion::class, mappedBy="receiver")
     */
    private $notificacion;





    public function __construct()
    {
        $this->notificacion = new ArrayCollection();
        $this->estadisticas = new ArrayCollection();

    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string)$this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string)$this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

    }

        public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro(\DateTimeInterface $fechaRegistro): self
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    public function getIpRegistro(): ?string
    {
        return $this->ipRegistro;
    }

    public function setIpRegistro(string $ipRegistro): self
    {
        $this->ipRegistro = $ipRegistro;

        return $this;
    }

    public function getUltimoAcceso(): ?\DateTimeInterface
    {
        return $this->ultimoAcceso;
    }

    public function setUltimoAcceso(\DateTimeInterface $ultimoAcceso): self
    {
        $this->ultimoAcceso = $ultimoAcceso;

        return $this;
    }

    public function getMonedas(): ?int
    {
        return $this->monedas;
    }

    public function setMonedas(int $monedas): self
    {
        $this->monedas = $monedas;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getAmigos(): Collection
    {
        return $this->amigos;
    }

    public function addAmigo(self $amigo): self
    {
        if (!$this->amigos->contains($amigo)) {
            $this->amigos[] = $amigo;
        }

        return $this;
    }

    public function removeAmigo(self $amigo): self
    {
        $this->amigos->removeElement($amigo);

        return $this;
    }

    /**
     * @return Collection|Notificacion[]
     */
    public function getNotificacion(): Collection
    {
        return $this->notificacion;
    }

    public function addNotificacion(Notificacion $notificacione): self
    {
        if (!$this->notificacion->contains($notificacione)) {
            $this->notificacion[] = $notificacione;
            $notificacione->setReceiver($this);
        }

        return $this;
    }

    public function removeNotificacion(Notificacion $notificacione): self
    {
        if ($this->notificacion->removeElement($notificacione)) {
            // set the owning side to null (unless already changed)
            if ($notificacione->getReceiver() === $this) {
                $notificacione->setReceiver(null);
            }
        }

        return $this;
    }

}
