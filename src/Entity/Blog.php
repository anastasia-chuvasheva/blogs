<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogRepository::class)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ondertitel = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $text = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $publiceerdatum = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imgExtra = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitel(): ?string
    {
        return $this->titel;
    }

    public function setTitel(string $titel): self
    {
        $this->titel = $titel;

        return $this;
    }

    public function getOndertitel(): ?string
    {
        return $this->ondertitel;
    }

    public function setOndertitel(?string $ondertitel): self
    {
        $this->ondertitel = $ondertitel;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getPubliceerdatum(): ?\DateTimeInterface
    {
        return $this->publiceerdatum;
    }

    public function setPubliceerdatum(\DateTimeInterface $publiceerdatum): self
    {
        $this->publiceerdatum = $publiceerdatum;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getImgExtra(): ?string
    {
        return $this->imgExtra;
    }

    public function setImgExtra(?string $imgExtra): self
    {
        $this->imgExtra = $imgExtra;

        return $this;
    }
}
