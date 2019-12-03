<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AveriasRepository")
 */
class Averias
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Local", inversedBy="averias" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $local;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    public function __construct()
    {
        $this->local = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Local[]
     */
    public function getLocal(): Collection
    {
        return $this->local;
    }

    public function addLocal(Local $local): self
    {
        if (!$this->local->contains($local)) {
            $this->local[] = $local;
            $local->setAverias($this);
        }

        return $this;
    }

    public function removeLocal(Local $local): self
    {
        if ($this->local->contains($local)) {
            $this->local->removeElement($local);
            // set the owning side to null (unless already changed)
            if ($local->getAverias() === $this) {
                $local->setAverias(null);
            }
        }

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function setLocal(?Local $local): self
    {
        $this->local = $local;

        return $this;
    }
}
