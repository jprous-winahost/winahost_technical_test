<?php

declare(strict_types=1);


namespace App\EventSubscriber\Owner;


use App\Owner\Domain\Event\CreateOwnerDomainEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psr\Log\LoggerInterface;

final class CreateOwnerEventSubscriber implements EventSubscriberInterface
{

    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            CreateOwnerDomainEvent::class => 'createOwnerLogger'
        ];
    }

    public function createOwnerLogger(CreateOwnerDomainEvent $event): void
    {
        // TODO:: fill this method showing the owner's uuid on the logs
    }


}