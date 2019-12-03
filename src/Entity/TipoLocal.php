<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoLocalRepository")
 */
class TipoLocal
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
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Local", mappedBy="tipoLocal")
     */
    private $local;

    public function __construct()
    {
        $this->local = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $local->setTipoLocal($this);
        }

        return $this;
    }

    public function removeLocal(Local $local): self
    {
        if ($this->local->contains($local)) {
            $this->local->removeElement($local);
            // set the owning side to null (unless already changed)
            if ($local->getTipoLocal() === $this) {
                $local->setTipoLocal(null);
            }
        }

        return $this;
    }
}
