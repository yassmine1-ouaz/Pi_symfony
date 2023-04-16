<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement", indexes={@ORM\Index(name="Id_oeuvre", columns={"Id_oeuvre"}), @ORM\Index(name="Id_Res", columns={"Id_Res"})})
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_event", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nom_Galerie", type="string", length=255, nullable=true)
     */
    private $nomGalerie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Description_Galerie", type="string", length=255, nullable=true)
     */
    private $descriptionGalerie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Date_Gal", type="string", length=255, nullable=true)
     */
    private $dateGal;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Nombre_Part", type="integer", nullable=true)
     */
    private $nombrePart;

    /**
     * @var int
     *
     * @ORM\Column(name="Nombre_Part_Rest", type="integer", nullable=false)
     */
    private $nombrePartRest;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var bool
     *
     * @ORM\Column(name="archiver", type="boolean", nullable=false)
     */
    private $archiver = '0';

    /**
     * @var \Reservation
     *
     * @ORM\ManyToOne(targetEntity="Reservation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Res", referencedColumnName="Id_Res")
     * })
     */
    private $idRes;

    /**
     * @var \Oeuvre
     *
     * @ORM\ManyToOne(targetEntity="Oeuvre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_oeuvre", referencedColumnName="Id")
     * })
     */
    private $idOeuvre;

    public function getIdEvent(): ?int
    {
        return $this->idEvent;
    }

    public function getNomGalerie(): ?string
    {
        return $this->nomGalerie;
    }

    public function setNomGalerie(?string $nomGalerie): self
    {
        $this->nomGalerie = $nomGalerie;

        return $this;
    }

    public function getDescriptionGalerie(): ?string
    {
        return $this->descriptionGalerie;
    }

    public function setDescriptionGalerie(?string $descriptionGalerie): self
    {
        $this->descriptionGalerie = $descriptionGalerie;

        return $this;
    }

    public function getDateGal(): ?string
    {
        return $this->dateGal;
    }

    public function setDateGal(?string $dateGal): self
    {
        $this->dateGal = $dateGal;

        return $this;
    }

    public function getNombrePart(): ?int
    {
        return $this->nombrePart;
    }

    public function setNombrePart(?int $nombrePart): self
    {
        $this->nombrePart = $nombrePart;

        return $this;
    }

    public function getNombrePartRest(): ?int
    {
        return $this->nombrePartRest;
    }

    public function setNombrePartRest(int $nombrePartRest): self
    {
        $this->nombrePartRest = $nombrePartRest;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

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

    public function getIdRes(): ?Reservation
    {
        return $this->idRes;
    }

    public function setIdRes(?Reservation $idRes): self
    {
        $this->idRes = $idRes;

        return $this;
    }

    public function getIdOeuvre(): ?Oeuvre
    {
        return $this->idOeuvre;
    }

    public function setIdOeuvre(?Oeuvre $idOeuvre): self
    {
        $this->idOeuvre = $idOeuvre;

        return $this;
    }


}
