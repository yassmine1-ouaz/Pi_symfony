<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Oeuvre
 *
 * @ORM\Table(name="oeuvre", indexes={@ORM\Index(name="Id_cat_oeuv", columns={"Id_cat_oeuv"})})
 * @ORM\Entity
 */
class Oeuvre
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    //#[ORM\Column(length: 255)]
    //private ?string $image = null;

    /**
     * @var string
     * 
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * 
     */
    private $image;

    /**
     * @var string
     * @Assert\NotBlank(message=" titre doit etre non vide")
     *  @Assert\Length(
     *      min = 5,
     *      minMessage=" Entrer un titre au mini de 5 caracteres"
     *     )
     * @ORM\Column(name="titre_oeuvre", type="string", length=255, nullable=true) 
     */

    private $titreOeuvre;

    /**
     * @var string
     *
     * @ORM\Column(name="artiste", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message=" le nom d'artiste doit etre non vide")
     */
    private $artiste;

    /**
     * @var string
     *
     * @ORM\Column(name="Famille", type="string", length=255, nullable=true)
     */
    private $famille;

    /**
     * @var string
     * @Assert\NotBlank(message=" Le prix doit etre non vide et entier")
     * @ORM\Column(name="prix_oeuvre", type="string", length=255, nullable=true)
     */
    private $prixOeuvre;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @var int
     *
     * @ORM\Column(name="archive", type="integer", nullable=true)
     */
    private $archive;


    // #[ORM\ManyToOne(inversedBy: 'oeuvres')]
    //private ?CategorieOeuvre $idCatOeuv = null;
    /**
     * @var CategorieOeuvre
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\CategorieOeuvre")
     * @ORM\JoinColumn(name="Id_cat_oeuv ", referencedColumnName="Id_cat_oeuv")
     */
    private $categorieOeuvre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTitreOeuvre(): ?string
    {
        return $this->titreOeuvre;
    }

    public function setTitreOeuvre(?string $titreOeuvre): self
    {
        $this->titreOeuvre = $titreOeuvre;

        return $this;
    }

    public function getArtiste(): ?string
    {
        return $this->artiste;
    }

    public function setArtiste(?string $artiste): self
    {
        $this->artiste = $artiste;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(?string $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getPrixOeuvre(): ?string
    {
        return $this->prixOeuvre;
    }

    public function setPrixOeuvre(?string $prixOeuvre): self
    {
        $this->prixOeuvre = $prixOeuvre;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getArchive(): ?int
    {
        return $this->archive;
    }

    public function setArchive(?int $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    /*public function getIdCatOeuv(): ?CategorieOeuvre
    {
        return $this->idCatOeuv;
    }

    public function setIdCatOeuv(?CategorieOeuvre $idCatOeuv): self
    {
        $this->idCatOeuv = $idCatOeuv;

        return $this;
    }*/

    public function getCategorieOeuvre(): ?CategorieOeuvre
    {
        return $this->categorieOeuvre;
    }

    public function setCategorieOeuvre(?CategorieOeuvre $categorieOeuvre): self
    {
        $this->categorieOeuvre = $categorieOeuvre;

        return $this;
    }
}
