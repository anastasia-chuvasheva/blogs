<?php namespace App\Controller;

use App\Entity\Blog;
use App\Entity\User;
use App\Form\SearchType;
use App\Repository\BlogRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog")
 */
class BlogController extends AbstractController
{
    private const PAGINATION_LIMIT = 5;

    #[Route('/show-all/{page}', name: 'blogs_show_all')]
    public function showAllBlogs(BlogRepository $blogRepository, Request $request, int $page = 1): Response
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
    public function showBlog(Blog $blog): Response
    {
        /** @var  User $user */
        $user = $this->getUser();

        if (!$blog->isActive() && !$user->isAdmin()) {

            throw new NotFoundHttpException();
        }
        return $this->render('blog/blog_show.html.twig', [
            'blog' => $blog,
        ]);
    }

    #[Route('/find-blogs/{title}', name: 'find_blogs')]
    public function findBlogs(BlogRepository $blogRepository, string $title): Response
    {
        $blogs= $blogRepository->findBlogsByName($title);

        return $this->render('blog/search.html.twig', [
            'blogs' => $blogs,
        ]);
    }

}
