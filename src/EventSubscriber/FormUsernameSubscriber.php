<?php namespace App\EventSubscriber;

use App\Repository\UserRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class FormUsernameSubscriber implements EventSubscriberInterface
{

    public function __construct(private UserRepository $userRepository)
    {

    }

    public static function getSubscribedEvents(): array
    {
        return [
            FormEvents::POST_SUBMIT => 'onPostSubmit',
        ];
    }

    public function onPostSubmit(FormEvent $event): void
    {
        $data = $event->getData();
        $username = $data->getUsername();
        $user = $this->userRepository->findOneUserByAUsername($username);

        if ($user !== null) {
            $form = $event->getForm();
            $error = new FormError("This username already exists. Add 1 to it or something.");
            $form->get('username')->addError($error);
        }

    }
}