<?php

namespace App\Entity;

use App\Repository\FamilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;



#[ORM\Entity(repositoryClass: FamilleRepository::class)]

class Famille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Libelle;

    #[ORM\Column(type: 'string', length: 255)]
    private $image_rep;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'familles')]
    private $parent;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: self::class)]
    private $familles;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $ordre_affichage;

    #[ORM\Column(type: "string", length:255, nullable:true)]
    private $image;

    #[ORM\OneToMany(mappedBy: 'famille', targetEntity: Produit::class)]
    private $produits;

    

    public function __construct()
    {
        $this->familles = new ArrayCollection();
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
   
    public function __toString()
    {
        return $this->Libelle;
    }

    /**
     * @return Collection<int, self>
     */
    public function getFamilles(): Collection
    {
        return $this->familles;
    }

    public function addFamille(self $famille): self
    {
        if (!$this->familles->contains($famille)) {
            $this->familles[] = $famille;
            $famille->setParent($this);
        }

        return $this;
    }

    public function removeFamille(self $famille): self
    {
        if ($this->familles->removeElement($famille)) {
            // set the owning side to null (unless already changed)
            if ($famille->getParent() === $this) {
                $famille->setParent(null);
            }
        }

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

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setFamille($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getFamille() === $this) {
                $produit->setFamille(null);
            }
        }

        return $this;
    }

  

}
