<?php

declare(strict_types=1);


namespace App\Owner\Infrastructure\Controllers;


use App\Owner\Application\CreateOwnerCommandHandler;
use App\Owner\Domain\Event\CreateOwnerDomainEvent;
use App\Owner\Infrastructure\Persistence\OwnerDoctrineRepository;
use App\Shared\Infrastructure\Controller\BaseController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;

final class OwnerPostController extends BaseController
{
    public function __construct(
        private readonly MessageBusInterface $commandBus,
        private readonly MessageBusInterface $queryBus,
        private readonly EventDispatcherInterface $dispatcher,
        private readonly OwnerDoctrineRepository $ownerDoctrineRepository
    )
    {
        parent::__construct($this->commandBus, $this->queryBus);
    }

    public function create(Request $request)
    {
        $requestData = json_decode($request->getContent(), true, JSON_THROW_ON_ERROR);

        $createOwnerCommandHandler = new CreateOwnerCommandHandler($this->ownerDoctrineRepository);
        $event = new CreateOwnerDomainEvent($createOwnerCommandHandler->handle($requestData));
        $this->dispatcher->dispatch($event);
    }
}