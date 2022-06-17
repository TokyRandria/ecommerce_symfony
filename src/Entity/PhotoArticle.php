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

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'images')]
    private $article;

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

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
    public function __toString(){
        return $this->photoRep;
    }
}
