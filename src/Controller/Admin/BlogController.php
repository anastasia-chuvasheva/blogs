<?php namespace App\Controller\Admin;

use App\Entity\Blog;
use App\Event\BlogCreatedEvent;
use App\Form\BlogType;
use App\Repository\BlogRepository;
use App\Service\FileManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/blog")
 */
class BlogController extends AbstractController
{
    public const PAGINATION_LIMIT = 5;

    #[Route('/create', name: 'blog_create')]
    public function create(
        EntityManagerInterface   $entityManager,
        Request                  $request,
        EventDispatcherInterface $eventDispatcher,
        FileManager              $fileManager
    ): Response
    {
        $blog = new Blog();

        $form = $this->createForm(BlogType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Blog $blog */
            $blog = $form->getData();
            $image = $form->get('image')->getData();
            $extraImage = $form->get('extraImage')->getData();

            if ($image) {
                $newFilename = $fileManager->handleFile($image);
                $blog->setImg($newFilename);
            }

            if ($extraImage) {
                $newFilename = $fileManager->handleFile($extraImage);
                $blog->setImgExtra($newFilename);
            }

            $entityManager->persist($blog);
            $entityManager->flush();

            $eventDispatcher->dispatch(new BlogCreatedEvent($blog), BlogCreatedEvent::NAME);

            return $this->redirectToRoute('blogs_show_all');
        }

        return $this->renderForm('blog/create.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/update/{blog}', name: 'blog_update')]
    public function update(EntityManagerInterface $entityManager, Request $request, Blog $blog, FileManager $fileManager): Response
    {
        $form = $this->createForm(BlogType::class, $blog);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Blog $blog */
            $blog = $form->getData();
            $image = $form->get('image')->getData();
            $extraImage = $form->get('extraImage')->getData();

            if ($image) {
                $newFilename = $fileManager->handleFile($image);
                $blog->setImg($newFilename);
            }

            if ($extraImage) {
                $newFilename = $fileManager->handleFile($extraImage);
                $blog->setImgExtra($newFilename);
            }

            $entityManager->flush();

            return $this->render('blog/blog_show.html.twig', [
                'blog' => $blog,
            ]);
        }

        return $this->renderForm('blog/create.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/blog/archive/{blog}', name: 'blog_archive')]
    public function archive(EntityManagerInterface $entityManager, Blog $blog): Response
    {
        $blog->setActive(false);

        $entityManager->persist($blog);
        $entityManager->flush();

        return $this->redirectToRoute('blogs_show_all');
    }

    #[Route('/blog/return/{blog}', name: 'blog_return')]
    public function return(EntityManagerInterface $entityManager, Blog $blog): Response
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

        $pagesCount = ceil(count($paginator) / self::PAGINATION_LIMIT);
        $postsAmount = count($paginator);

        $blogs = $paginator
            ->getQuery()
            ->setFirstResult(self::PAGINATION_LIMIT * ($page - 1))
            ->setMaxResults(self::PAGINATION_LIMIT)
            ->getResult();

        return $this->render('blog/archived.html.twig', [
            'blogs' => $blogs,
            'pagesCount' => $pagesCount,
            'page' => $page,
            'postsAmount' => $postsAmount,
        ]);
    }
}
