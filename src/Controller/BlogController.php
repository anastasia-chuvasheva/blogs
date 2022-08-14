<?php namespace App\Controller;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{
    private const PAGINATION_LIMIT = 5;

    #[Route('/show-all/{page}', name: 'blogs_show_all')]
    public function showAllBlogs(BlogRepository $blogRepository, int $page = 1): Response
    {
        $paginator = new Paginator($blogRepository->findAllActiveQueryBuilder());

        $pagesCount = ceil(count($paginator)/self::PAGINATION_LIMIT);
        $postsAmount = count($paginator);

        $blogs = $paginator
            ->getQuery()
            ->setFirstResult(self::PAGINATION_LIMIT * ($page-1))
            ->setMaxResults(self::PAGINATION_LIMIT)
            ->getResult();

        return $this->render('blog/index.html.twig', [
            'blogs' => $blogs,
            'pagesCount' => $pagesCount,
            'page' => $page,
            'postsAmount' => $postsAmount,

        ]);
    }

    #[Route('/show/{blog}', name: 'blog_show')]
    public function showBlog(Blog $blog, BlogRepository $blogRepository): Response
    {
        return $this->render('blog/blog_show.html.twig', [
            'blog' => $blog,
        ]);
    }
}
