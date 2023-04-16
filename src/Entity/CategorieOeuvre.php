<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CategorieOeuvre
 *
 * @ORM\Table(name="categorie_oeuvre")
 * @ORM\Entity(repositoryClass="App\Repository\CategorieOeuvreRepository")
 */
class CategorieOeuvre
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_cat_oeuv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCatOeuv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nom_cat_oeuv", type="string", length=255, nullable=true)
     *  * @Assert\NotBlank(message=" Categorie doit etre non vide")
     *  @Assert\Length(
     *      min = 5,
     *      minMessage=" Entrer un titre au mini de 5 caracteres"
     *     )
     */
    private $nomCatOeuv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description_cat_oeuv", type="string", length=255, nullable=true)
     */
    private $descriptionCatOeuv;

    public function getIdCatOeuv(): ?int
    {
        return $this->idCatOeuv;
    }

    public function getNomCatOeuv(): ?string
    {
        return $this->nomCatOeuv;
    }

    public function setNomCatOeuv(?string $nomCatOeuv): self
    {
        $this->nomCatOeuv = $nomCatOeuv;

        return $this;
    }

    public function getDescriptionCatOeuv(): ?string
    {
        return $this->descriptionCatOeuv;
    }

    public function setDescriptionCatOeuv(?string $descriptionCatOeuv): self
    {
        $this->descriptionCatOeuv = $descriptionCatOeuv;

        return $this;
    }
    /**
     * Generates the magic method
     * 
     */
    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->nomCatOeuv;
        // to show the id of the Category in the select
        // return $this->id;
    }
}
