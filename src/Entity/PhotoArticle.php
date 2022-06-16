<?php

namespace App\Entity;

use App\Repository\PhotoArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoArticleRepository::class)]
class PhotoArticle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $photoRep;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotoRep(): ?string
    {
        return $this->photoRep;
    }

    public function setPhotoRep(string $photoRep): self
    {
        $this->photoRep = $photoRep;

        return $this;
    }
}
