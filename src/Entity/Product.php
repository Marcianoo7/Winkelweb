<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
    private $productOmschrijving;

    /**
     * @ORM\Column(type="integer")
     */
    private $productBtw;

    /**
     * @ORM\Column(type="float")
     */
    private $productPrijs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FactuurRegel", mappedBy="productCode")
     */
    private $factuurRegels;

    public function __construct()
    {
        $this->factuurRegels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductOmschrijving(): ?string
    {
        return $this->productOmschrijving;
    }

    public function setProductOmschrijving(string $productOmschrijving): self
    {
        $this->productOmschrijving = $productOmschrijving;

        return $this;
    }

    public function getProductBtw(): ?int
    {
        return $this->productBtw;
    }

    public function setProductBtw(int $productBtw): self
    {
        $this->productBtw = $productBtw;

        return $this;
    }

    public function getProductPrijs(): ?float
    {
        return $this->productPrijs;
    }

    public function setProductPrijs(float $productPrijs): self
    {
        $this->productPrijs = $productPrijs;

        return $this;
    }

    /**
     * @return Collection|FactuurRegel[]
     */
    public function getFactuurRegels(): Collection
    {
        return $this->factuurRegels;
    }

    public function addFactuurRegel(FactuurRegel $factuurRegel): self
    {
        if (!$this->factuurRegels->contains($factuurRegel)) {
            $this->factuurRegels[] = $factuurRegel;
            $factuurRegel->setProductCode($this);
        }

        return $this;
    }

    public function removeFactuurRegel(FactuurRegel $factuurRegel): self
    {
        if ($this->factuurRegels->contains($factuurRegel)) {
            $this->factuurRegels->removeElement($factuurRegel);
            // set the owning side to null (unless already changed)
            if ($factuurRegel->getProductCode() === $this) {
                $factuurRegel->setProductCode(null);
            }
        }

        return $this;
    }
}
