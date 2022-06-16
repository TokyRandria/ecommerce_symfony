<?php

namespace App\Entity;

use App\Repository\TypeCaracteristiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeCaracteristiqueRepository::class)]
class TypeCaracteristique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $nom;

    #[ORM\Column(type: 'boolean')]
    private $valeur_est_unique;

    #[ORM\OneToMany(mappedBy: 'typecaracteristique', targetEntity: ValeurCaracteristique::class, orphanRemoval: true)]
    private $valeurcaracteristiques;

    public function __construct()
    {
        $this->valeurcaracteristiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function isValeurEstUnique(): ?bool
    {
        return $this->valeur_est_unique;
    }

    public function setValeurEstUnique(bool $valeur_est_unique): self
    {
        $this->valeur_est_unique = $valeur_est_unique;

        return $this;
    }
    public function __toString(){
        return $this->nom;
    }

    /**
     * @return Collection<int, Valeurcaracteristique>
     */
    public function getValeurcaracteristiques(): Collection
    {
        return $this->valeurcaracteristiques;
    }

    public function addValeurcaracteristique(ValeurCaracteristique $valeurcaracteristique): self
    {
        if (!$this->valeurcaracteristiques->contains($valeurcaracteristique)) {
            $this->valeurcaracteristiques[] = $valeurcaracteristique;
            $valeurcaracteristique->setTypecaracteristique($this);
        }

        return $this;
    }

    public function removeValeurcaracteristique(ValeurCaracteristique $valeurcaracteristique): self
    {
        if ($this->valeurcaracteristiques->removeElement($valeurcaracteristique)) {
            // set the owning side to null (unless already changed)
            if ($valeurcaracteristique->getTypecaracteristique() === $this) {
                $valeurcaracteristique->setTypecaracteristique(null);
            }
        }

        return $this;
    }
}
