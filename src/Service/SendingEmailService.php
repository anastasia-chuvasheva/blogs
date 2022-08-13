<?php namespace App\Service;

use App\Entity\Blog;
use App\Repository\UserRepository;
use Mailjet\Client;
use Mailjet\Resources;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Entity\Role;

class SendingEmailService
{
    private UserRepository $userRepository;
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator, UserRepository $userRepository)
    {

        $this->urlGenerator = $urlGenerator;
        $this->userRepository = $userRepository;
    }

    public function sendEmail(Blog $blog): void
    {
        $mj = new Client('96bd9a4aa87a62572c569d070991778b', 'bc2ca8bb196a5e68fa7b16a02b6e1bfb', true, ['version' => 'v3.1']);
        $link = $this->urlGenerator->generate('blog_show', ['blog' => $blog->getId()], UrlGeneratorInterface::ABSOLUTE_URL);
        $users = $this->userRepository->findBy(['role' => Role::USER], ['id' => 'ASC']);
        foreach ($users as $user) {
            $email = $user->getEmail();
            $username = $user->getUsername();
            $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => "info.blog.post.project@gmail.com",
                            'Name' => "Anastasia"
                        ],
                        'To' => [
                            [
                                'Email' => "$email",
                                'Name' => "$username"
                            ]
                        ],
                        'Subject' => "New blog",
                        'TextPart' => "New blog was added",
                        'HTMLPart' => "<h3> New blog was added, so if you'd like, you can check it out here: <a href='$link'>Link</a>!</h3> <br> Have fun!",
                        'CustomID' => "AppGettingStartedTest"
                    ]
                ]
            ];
            $mj->post(Resources::$Email, ['body' => $body]);
        }
    }
}