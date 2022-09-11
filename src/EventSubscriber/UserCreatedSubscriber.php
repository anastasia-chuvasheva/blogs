<?php namespace App\EventSubscriber;

use App\Entity\Role;
use App\Event\UserCreatedEvent;
use App\Repository\RoleRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserCreatedSubscriber implements EventSubscriberInterface
{
    public function __construct(private RoleRepository $roleRepository){

    }

    public static function getSubscribedEvents(): array
    {
        return [
            UserCreatedEvent::NAME => 'userCreated',
        ];
    }

    public function userCreated(UserCreatedEvent $createdEvent): void
    {
        $user = $createdEvent->getUser();
        $user->setRole($this->roleRepository->find(Role::USER));
    }


}