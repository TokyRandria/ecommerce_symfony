<?php

namespace App\Entity;

use App\Repository\TaxeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaxeRepository::class)]
class Taxe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $libelle;

    #[ORM\Column(type: 'float')]
    private $taux_taxe;

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

    public function getTauxTaxe(): ?float
    {
        return $this->taux_taxe;
    }

    public function setTauxTaxe(float $taux_taxe): self
    {
        $this->taux_taxe = $taux_taxe;

        return $this;
    }
}
