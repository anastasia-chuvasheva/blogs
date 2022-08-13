<?php namespace App\EventSubscriber;

use App\Event\BlogCreatedEvent;
use App\Service\SendingEmailService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BlogCreatedSubscriber implements EventSubscriberInterface
{
    private SendingEmailService $sendingEmailService;

    public function __construct(SendingEmailService $sendingEmailService)
    {
        $this->sendingEmailService = $sendingEmailService;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            BlogCreatedEvent::NAME => 'blogCreated',
        ];
    }

    /**
     * @param BlogCreatedEvent $createdEvent
     *
     * @return void
     */
    public function blogCreated(BlogCreatedEvent $createdEvent): void
    {
        $blog = $createdEvent->getBlog();
        $this->sendingEmailService->sendEmail($blog);
    }

}