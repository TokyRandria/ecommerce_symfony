<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'produitref', targetEntity: Article::class)]
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

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
    public function __toString(){
        return $this->libelle;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setProduitref($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getProduitref() === $this) {
                $article->setProduitref(null);
            }
        }

        return $this;
    }
}
