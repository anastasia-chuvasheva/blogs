<?php namespace App\Event;

use App\Entity\Blog;
use Symfony\Contracts\EventDispatcher\Event;

class BlogCreatedEvent extends Event
{
    public const NAME = 'blog.created';

    private Blog $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function getBlog(): Blog
    {
        return $this->blog;
    }
}