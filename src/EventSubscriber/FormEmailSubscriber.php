<?php namespace App\EventSubscriber;

use App\Repository\UserRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class FormEmailSubscriber implements EventSubscriberInterface
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
        $email = $data->getEmail();
        $user = $this->userRepository->findOneUserByAnEmail($email);

        if ($user !== null) {
            $form = $event->getForm();
            $error = new FormError("This e-mail already exists. Come up with something new.");
            $form->get('email')->addError($error);
        }

    }
}