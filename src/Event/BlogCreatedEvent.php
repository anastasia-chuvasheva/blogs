<?php namespace App\Event;

use App\Entity\Blog;
use Symfony\Contracts\EventDispatcher\Event;

class BlogCreatedEvent extends Event
{
    public const NAME = 'blog.created';

    /**
     * @var Blog
     */
    private $blog;

    /**
     * @param Blog $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @return Blog
     */
    public function getBlog(): Blog
    {
        return $this->blog;
    }
}