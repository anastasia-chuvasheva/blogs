<?php namespace App\Controller;

use App\Entity\Role;
use App\Form\RegisterType;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Security\Http\Authenticator\FormLoginAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;

class UserController extends AbstractController
{
    public function __construct(
        public FormLoginAuthenticator $authenticator
    )
    {

    }

    /**
     * @Route("/register", name="user_register")
     *
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     *
     * @return Response
     */
    public function registerUserAction(
        Request                     $request,
        EntityManagerInterface      $entityManager,
        RoleRepository              $roleRepository,
        UserAuthenticatorInterface  $authenticatorManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response
    {
        $form = $this->createForm(RegisterType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $user->setRole($roleRepository->find(2));
            $plaintextPassword = $user->getPassword();
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $plaintextPassword
            );

            $user->setPassword($hashedPassword);
            $entityManager->persist($user);
            $entityManager->flush();
            $authenticatorManager->authenticateUser($user, $this->authenticator, $request, [new RememberMeBadge()]);

            return $this->redirectToRoute('blogs_show_all');
        }

        return $this->renderForm('register.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/find-username/{username}', name: 'find_username')]
    public function findUsername(UserRepository $userRepository, string $username): Response
    {
        $users = $userRepository->findBy(['username' => $username]);

        return $this->render('find_username.html.twig', [
            'users' => $users,
        ]);
    }

}