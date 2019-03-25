<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Form\FormTypeInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContinenteRepository")
 */
class Continente
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
     * @ORM\OneToMany(targetEntity="App\Entity\Avispas", mappedBy="continente")
     */
    private $avispas;

    public function __construct()
    {
        $this->avispas = new ArrayCollection();
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

    public function __toString(){

        return $this -> nombre;
    }

    /**
     * @return Collection|Avispas[]
     */
    public function getAvispas(): Collection
    {
        return $this->avispas;
    }

    public function addAvispa(Avispas $avispa): self
    {
        if (!$this->avispas->contains($avispa)) {
            $this->avispas[] = $avispa;
            $avispa->setContinente($this);
        }

        return $this;
    }

    public function removeAvispa(Avispas $avispa): self
    {
        if ($this->avispas->contains($avispa)) {
            $this->avispas->removeElement($avispa);
            // set the owning side to null (unless already changed)
            if ($avispa->getContinente() === $this) {
                $avispa->setContinente(null);
            }
        }

        return $this;
    }
}
