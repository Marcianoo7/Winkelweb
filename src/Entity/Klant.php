<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KlantRepository")
 */
class Klant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $btwNummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $klantNaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $woonPlaats;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $postCode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Factuur", mappedBy="klantNummer")
     */
    private $factuurs;

    public function __construct()
    {
        $this->factuurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBtwNummer(): ?int
    {
        return $this->btwNummer;
    }

    public function setBtwNummer(int $btwNummer): self
    {
        $this->btwNummer = $btwNummer;

        return $this;
    }

    public function getKlantNaam(): ?string
    {
        return $this->klantNaam;
    }

    public function setKlantNaam(string $klantNaam): self
    {
        $this->klantNaam = $klantNaam;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getWoonPlaats(): ?string
    {
        return $this->woonPlaats;
    }

    public function setWoonPlaats(string $woonPlaats): self
    {
        $this->woonPlaats = $woonPlaats;

        return $this;
    }

    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * @return Collection|Factuur[]
     */
    public function getFactuurs(): Collection
    {
        return $this->factuurs;
    }

    public function addFactuur(Factuur $factuur): self
    {
        if (!$this->factuurs->contains($factuur)) {
            $this->factuurs[] = $factuur;
            $factuur->setKlantNummer($this);
        }

        return $this;
    }

    public function removeFactuur(Factuur $factuur): self
    {
        if ($this->factuurs->contains($factuur)) {
            $this->factuurs->removeElement($factuur);
            // set the owning side to null (unless already changed)
            if ($factuur->getKlantNummer() === $this) {
                $factuur->setKlantNummer(null);
            }
        }

        return $this;
    }
}
