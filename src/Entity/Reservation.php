<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="id_invit", columns={"id_user"}), @ORM\Index(name="Id_event", columns={"Id_event"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Res", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRes;

    /**
     * @var string
     *
     * @ORM\Column(name="Date", type="string", length=30, nullable=false)
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="PrixR", type="float", precision=10, scale=0, nullable=false, options={"default"="25"})
     */
    private $prixr = 25;

    /**
     * @var bool
     *
     * @ORM\Column(name="archiver", type="boolean", nullable=false)
     */
    private $archiver = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="payer", type="boolean", nullable=false)
     */
    private $payer = '0';

    /**
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_event", referencedColumnName="Id_event")
     * })
     */
    private $idEvent;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    public function getIdRes(): ?int
    {
        return $this->idRes;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPrixr(): ?float
    {
        return $this->prixr;
    }

    public function setPrixr(float $prixr): self
    {
        $this->prixr = $prixr;

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

    public function isPayer(): ?bool
    {
        return $this->payer;
    }

    public function setPayer(bool $payer): self
    {
        $this->payer = $payer;

        return $this;
    }

    public function getIdEvent(): ?Evenement
    {
        return $this->idEvent;
    }

    public function setIdEvent(?Evenement $idEvent): self
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    public function getIdUser(): ?Users
    {
        return $this->idUser;
    }

    public function setIdUser(?Users $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


}
