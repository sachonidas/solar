<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocalRepository")
 */
class Local
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
    private $latitud;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $longitud;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Averias", mappedBy="local")
     */
    private $averias;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoLocal", inversedBy="local")
     */
    private $tipoLocal;


    public function __construct()
    {
        $this->averias = new ArrayCollection();
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

    public function getLatitud(): ?string
    {
        return $this->latitud;
    }

    public function setLatitud(string $latitud): self
    {
        $this->latitud = $latitud;

        return $this;
    }

    public function getLongitud(): ?string
    {
        return $this->longitud;
    }

    public function setLongitud(string $longitud): self
    {
        $this->longitud = $longitud;

        return $this;
    }

    public function getAverias(): Collection
    {
        return $this->averias;
    }

    public function setAverias(\App\Entity\Averias $averias): self
    {
        $this->averias = $averias;

        return $this;
    }

    public function getTipoLocal(): ?TipoLocal
    {
        return $this->tipoLocal;
    }

    public function setTipoLocal(?TipoLocal $tipoLocal): self
    {
        $this->tipoLocal = $tipoLocal;

        return $this;
    }

    public function addAveria(Averias $averia): self
    {
        if (!$this->averias->contains($averia)) {
            $this->averias[] = $averia;
            $averia->setAverias($this);
        }

        return $this;
    }

    public function removeAveria(Averias $averia): self
    {
        if ($this->averias->contains($averia)) {
            $this->averias->removeElement($averia);
            // set the owning side to null (unless already changed)
            if ($averia->getAverias() === $this) {
                $averia->setAverias(null);
            }
        }

        return $this;
    }

}
