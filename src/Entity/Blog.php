<?php namespace App\Entity;

use App\Repository\BlogRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogRepository::class)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $subtitle = null;

    #[ORM\Column(type: Types::STRING, length: 500, nullable: true)]
    private ?string $text = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTime $publishDate = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $imgExtra = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?bool $active = true;

    #[ORM\OneToMany(mappedBy: 'blog', targetEntity: Comment::class, orphanRemoval: true)]
    private Collection $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubTitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubTitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

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

    public function getPublishDate(): ?DateTime
    {
        return $this->publishDate;
    }

    public function setPublishDate(DateTime $publishDate): self
    {
        $this->publishDate = $publishDate;

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

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setBlog($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            if ($comment->getBlog() === $this) {
                $comment->setBlog(null);
            }
        }

        return $this;
    }
}
