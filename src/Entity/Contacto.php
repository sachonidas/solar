<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactoRepository")
 */
class Contacto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
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
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $asunto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mensaje;

    /**
     * @ORM\Column(type="boolean", length=1)
     */
    private $leido;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAsunto(): ?string
    {
        return $this->asunto;
    }

    public function setAsunto(?string $asunto): self
    {
        $this->asunto = $asunto;

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

    public function getLeido()
    {
        return $this->leido;
    }

    public function setLeido($leido): self
    {
        $this->leido = $leido;

        return $this;
    }
}
