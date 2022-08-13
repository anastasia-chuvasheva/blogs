<?php namespace App\Controller;

use App\Entity\Blog;
use App\Event\BlogCreatedEvent;
use App\Form\BlogType;
use App\Repository\BlogRepository;
use App\Service\SendingEmailService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
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

        $blogs = $paginator
            ->getQuery()
            ->setFirstResult(self::PAGINATION_LIMIT * ($page-1))
            ->setMaxResults(self::PAGINATION_LIMIT)
            ->getResult();

        return $this->render('blog/index.html.twig', [
            'blogs' => $blogs,
            'pagesCount' => $pagesCount,
            'page' => $page,
        ]);
    }

    #[Route('/show/{blog}', name: 'blog_show')]
    public function showBlog(Blog $blog, BlogRepository $blogRepository): Response
    {
        return $this->render('blog/blog_show.html.twig', [
            'blog' => $blog,
        ]);
    }

    #[Route('/create', name: 'blog_create')]
    public function create(EntityManagerInterface $entityManager, Request $request, EventDispatcherInterface $eventDispatcher): Response
    {
        $blog = new Blog();

        $form = $this->createForm(BlogType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $blog = $form->getData();

            $entityManager->persist($blog);
            $entityManager->flush();

//            $eventDispatcher->dispatch(new BlogCreatedEvent($blog), BlogCreatedEvent::NAME);

            return $this->redirectToRoute('blogs_show_all');
        }

        return $this->renderForm('blog/create.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/update/{blog}', name: 'blog_update')]
    public function update(EntityManagerInterface $entityManager, Request $request, Blog $blog, BlogRepository $blogRepository): Response
    {
        $blog = new Blog();
        $form = $this->createForm(BlogType::class, $blog);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $brand = $form->getData();

            $entityManager->persist($blog);
            $entityManager->flush();

            return $this->render('blog/blog_show.html.twig', [
                'blog' => $blog,
            ]);
//            return $this->redirectToRoute('blogs_show_all');
        }

        return $this->renderForm('blog/create.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/blog/archive/{blog}', name: 'blog_archive')]
    public function archive(EntityManagerInterface $entityManager, Blog $blog, BlogRepository $blogRepository): Response
    {
        $blog->setActive(false);
        $entityManager->persist($blog);
        $entityManager->flush();

        return $this->redirectToRoute('blogs_show_all');
    }

    #[Route('/blog/return/{blog}', name: 'blog_return')]
    public function return(EntityManagerInterface $entityManager, Blog $blog, BlogRepository $blogRepository): Response
    {
        $blog->setActive(true);
        $entityManager->persist($blog);
        $entityManager->flush();

        return $this->redirectToRoute('blogs_show_archived');
    }

    #[Route('/show-archived/{page}', name: 'blogs_show_archived')]
    public function showArchived(BlogRepository $blogRepository, int $page = 1): Response
    {
        $paginator = new Paginator($blogRepository->findAllNotActiveQueryBuilder());

        $pagesCount = ceil(count($paginator)/self::PAGINATION_LIMIT);

        $blogs = $paginator
            ->getQuery()
            ->setFirstResult(self::PAGINATION_LIMIT * ($page-1))
            ->setMaxResults(self::PAGINATION_LIMIT)
            ->getResult();

        return $this->render('blog/archived.html.twig', [
            'blogs' => $blogs,
            'pagesCount' => $pagesCount,
            'page' => $page,
        ]);
    }
}
