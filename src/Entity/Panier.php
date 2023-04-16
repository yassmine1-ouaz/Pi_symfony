<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier", indexes={@ORM\Index(name="Id", columns={"Id"})})
 * @ORM\Entity
 */
class Panier
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_panier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPanier;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_oeuvre", type="string", length=255, nullable=false)
     */
    private $titreOeuvre;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_oeuvre", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixOeuvre;

    /**
     * @var float
     *
     * @ORM\Column(name="Prix_Total", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixTotal;

    /**
     * @var \Oeuvre
     *
     * @ORM\ManyToOne(targetEntity="Oeuvre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id", referencedColumnName="Id")
     * })
     */
    private $id;

    public function getIdPanier(): ?int
    {
        return $this->idPanier;
    }

    public function getTitreOeuvre(): ?string
    {
        return $this->titreOeuvre;
    }

    public function setTitreOeuvre(string $titreOeuvre): self
    {
        $this->titreOeuvre = $titreOeuvre;

        return $this;
    }

    public function getPrixOeuvre(): ?float
    {
        return $this->prixOeuvre;
    }

    public function setPrixOeuvre(float $prixOeuvre): self
    {
        $this->prixOeuvre = $prixOeuvre;

        return $this;
    }

    public function getPrixTotal(): ?float
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(float $prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function getId(): ?Oeuvre
    {
        return $this->id;
    }

    public function setId(?Oeuvre $id): self
    {
        $this->id = $id;

        return $this;
    }


}
