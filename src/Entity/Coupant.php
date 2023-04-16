<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Coupant
 *
 * @ORM\Table(name="coupant")
 * @ORM\Entity
 */
class Coupant
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Coupant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCoupant;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=30, nullable=false)
     */
    private $code;

    /**
     * @var int
     *
     * @ORM\Column(name="Valeur", type="integer", nullable=false)
     */
    private $valeur;

    /**
     * @var bool
     *
     * @ORM\Column(name="archiver", type="boolean", nullable=false)
     */
    private $archiver = '0';

    public function getIdCoupant(): ?int
    {
        return $this->idCoupant;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function isArchiver(): ?bool
    {
        return $this->archiver;
    }

    public function setArchiver(bool $archiver): self
    {
        $this->archiver = $archiver;

        return $this;
    }


}
