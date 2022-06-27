<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $debutPromo;

    #[ORM\Column(type: 'datetime')]
    private $finPromo;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer')]
    private $quantiteEnpromo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titre;

    #[ORM\Column(type: 'boolean')]
    private $estEnAvant;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photoRep;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'promotions')]
    #[ORM\JoinColumn(nullable: false)]
    private $article;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDebutPromo(): ?\DateTimeInterface
    {
        return $this->debutPromo;
    }

    public function setDebutPromo(\DateTimeInterface $debutPromo): self
    {
        $this->debutPromo = $debutPromo;

        return $this;
    }

    public function getFinPromo(): ?\DateTimeInterface
    {
        return $this->finPromo;
    }

    public function setFinPromo(\DateTimeInterface $finPromo): self
    {
        $this->finPromo = $finPromo;

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

    public function getQuantiteEnpromo(): ?int
    {
        return $this->quantiteEnpromo;
    }

    public function setQuantiteEnpromo(int $quantiteEnpromo): self
    {
        $this->quantiteEnpromo = $quantiteEnpromo;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function isEstEnAvant(): ?bool
    {
        return $this->estEnAvant;
    }

    public function setEstEnAvant(bool $estEnAvant): self
    {
        $this->estEnAvant = $estEnAvant;

        return $this;
    }

    public function getPhotoRep(): ?string
    {
        return $this->photoRep;
    }

    public function setPhotoRep(?string $photoRep): self
    {
        $this->photoRep = $photoRep;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
