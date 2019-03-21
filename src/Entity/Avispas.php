<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvispasRepository")
 */
class Avispas
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
    private $entorno;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\Column(type="boolean")
     */
    private $venenosa;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Continente", inversedBy="avispas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $continente;

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

    public function getEntorno(): ?string
    {
        return $this->entorno;
    }

    public function setEntorno(string $entorno): self
    {
        $this->entorno = $entorno;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getVenenosa(): ?bool
    {
        return $this->venenosa;
    }

    public function setVenenosa(bool $venenosa): self
    {
        $this->venenosa = $venenosa;

        return $this;
    }

    public function getContinente(): ?Continente
    {
        return $this->continente;
    }

    public function setContinente(?Continente $continente): self
    {
        $this->continente = $continente;

        return $this;
    }
}
