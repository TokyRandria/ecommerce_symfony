<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $reference;

    #[ORM\Column(type: 'string', length: 100)]
    private $libelle;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $prix_reference;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $ordre_affichage;

    #[ORM\Column(type: 'string', length: 255)]
    private $image_rep;

    #[ORM\ManyToOne(targetEntity: Famille::class, inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private $famille;

    #[ORM\ManyToOne(targetEntity: Taxe::class)]
    private $taxe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixReference(): ?int
    {
        return $this->prix_reference;
    }

    public function setPrixReference(?int $prix_reference): self
    {
        $this->prix_reference = $prix_reference;

        return $this;
    }

    public function getOrdreAffichage(): ?int
    {
        return $this->ordre_affichage;
    }

    public function setOrdreAffichage(?int $ordre_affichage): self
    {
        $this->ordre_affichage = $ordre_affichage;

        return $this;
    }

    public function getImageRep(): ?string
    {
        return $this->image_rep;
    }

    public function setImageRep(string $image_rep): self
    {
        $this->image_rep = $image_rep;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getTaxe(): ?Taxe
    {
        return $this->taxe;
    }

    public function setTaxe(?Taxe $taxe): self
    {
        $this->taxe = $taxe;

        return $this;
    }
}
