<?php

namespace App\Entity;

use App\Repository\TypeCaracteristiqueRepository;
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
}
