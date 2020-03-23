<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FactuurRegelRepository")
 */
class FactuurRegel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\factuur", inversedBy="factuurRegels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $factuurNummer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\product", inversedBy="factuurRegels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productCode;

    /**
     * @ORM\Column(type="integer")
     */
    private $productAantal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactuurNummer(): ?factuur
    {
        return $this->factuurNummer;
    }

    public function setFactuurNummer(?factuur $factuurNummer): self
    {
        $this->factuurNummer = $factuurNummer;

        return $this;
    }

    public function getProductCode(): ?product
    {
        return $this->productCode;
    }

    public function setProductCode(?product $productCode): self
    {
        $this->productCode = $productCode;

        return $this;
    }

    public function getProductAantal(): ?int
    {
        return $this->productAantal;
    }

    public function setProductAantal(int $productAantal): self
    {
        $this->productAantal = $productAantal;

        return $this;
    }
}
