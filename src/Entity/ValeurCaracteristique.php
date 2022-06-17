<?php

namespace App\Entity;

use App\Repository\ValeurCaracteristiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ValeurCaracteristiqueRepository::class)]
class ValeurCaracteristique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\ManyToOne(targetEntity: TypeCaracteristique::class, inversedBy: 'valeurcaracteristiques')]
    #[ORM\JoinColumn(nullable: false)]
    private $typecaracteristique;

    #[ORM\ManyToMany(targetEntity: Article::class, mappedBy: 'valeurdeclinaison')]
    private $article;

    public function __construct()
    {
        $this->article = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->libelle;
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

    public function getTypecaracteristique(): ?typecaracteristique
    {
        return $this->typecaracteristique;
    }

    public function setTypecaracteristique(?typecaracteristique $typecaracteristique): self
    {
        $this->typecaracteristique = $typecaracteristique;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
            $article->addValeurdeclinaison($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->article->removeElement($article)) {
            $article->removeValeurdeclinaison($this);
        }

        return $this;
    }
}
