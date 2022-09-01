<?php namespace App\Controller;

use App\Entity\Blog;
use App\Entity\User;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comment")
 */
class CommentController extends AbstractController
{
    #[Route('/create/{blog}', name: 'comment_create')]
    public function create(EntityManagerInterface $entityManager, Request $request, Blog $blog): Response
    {
        $form = $this->createForm(CommentType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form->getData();

            $comment->setBlog($blog);
            $comment->setUser($this->getUser());

            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('blog_show', [
                'blog' => $blog->getId(),
            ]);
        }
        return $this->renderForm('comment/create.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/retrieve-comments/{blog}/{offset}', name: 'blog_retrieve_comments')]
    public function retrieveComments(Blog $blog, CommentRepository $commentRepository, int $offset): Response
    {
        $comments = $commentRepository->loadComments($offset, $blog);

        return $this->render('comment/show_comments.html.twig', [
            'comments' => $comments,
        ]);
    }
}
