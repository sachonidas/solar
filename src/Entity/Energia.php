<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnergiaRepository")
 */
class Energia
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Local", inversedBy="local" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $granja;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $potencia;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGranja(): ?string
    {
        return $this->granja;
    }

    public function setGranja(string $granja): self
    {
        $this->granja = $granja;

        return $this;
    }

    public function getPotencia(): ?string
    {
        return $this->potencia;
    }

    public function setPotencia(string $potencia): self
    {
        $this->potencia = $potencia;

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
}
