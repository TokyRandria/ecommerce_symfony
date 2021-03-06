<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer')]
    private $prixHT;

    #[ORM\ManyToMany(targetEntity: ValeurCaracteristique::class, inversedBy: 'article')]
    private $valeurdeclinaison;

    #[ORM\Column(type: 'integer')]
    private $quantite;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: PhotoArticle::class)]
    private $images;

    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private $produitref;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: Promotion::class, orphanRemoval: true)]
    private $promotions;

    public function __construct()
    {
        $this->valeurdeclinaison = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->promotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrixHT(): ?int
    {
        return $this->prixHT;
    }

    public function setPrixHT(int $prixHT): self
    {
        $this->prixHT = $prixHT;

        return $this;
    }

    /**
     * @return Collection<int, ValeurCaracteristique>
     */
    public function getValeurdeclinaison(): Collection
    {
        return $this->valeurdeclinaison;
    }

    public function addValeurdeclinaison(ValeurCaracteristique $valeurdeclinaison): self
    {
        if (!$this->valeurdeclinaison->contains($valeurdeclinaison)) {
            $this->valeurdeclinaison[] = $valeurdeclinaison;
        }

        return $this;
    }

    public function removeValeurdeclinaison(ValeurCaracteristique $valeurdeclinaison): self
    {
        $this->valeurdeclinaison->removeElement($valeurdeclinaison);

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * @return Collection<int, PhotoArticle>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(PhotoArticle $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setArticle($this);
        }

        return $this;
    }

    public function removeImage(PhotoArticle $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getArticle() === $this) {
                $image->setArticle(null);
            }
        }

        return $this;
    }

    public function getProduitref(): ?Produit
    {
        return $this->produitref;
    }

    public function setProduitref(?Produit $produitref): self
    {
        $this->produitref = $produitref;

        return $this;
    }

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotions(): Collection
    {
        return $this->promotions;
    }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions[] = $promotion;
            $promotion->setArticle($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->promotions->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getArticle() === $this) {
                $promotion->setArticle(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->libelle;
    }
}
