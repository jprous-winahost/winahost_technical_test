<?php

declare(strict_types=1);


namespace App\Owner\Infrastructure\Controllers;


use App\Shared\Infrastructure\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;

final class OwnerPostController extends BaseController
{
    public function __construct(
        private readonly MessageBusInterface $commandBus,
        private readonly MessageBusInterface $queryBus
    )
    {
        parent::__construct($this->commandBus, $this->queryBus);
    }

    public function create(Request $request)
    {
        $requestData = json_decode($request->getContent(), true, JSON_THROW_ON_ERROR);

        print_r('You should to implement the feature below' . PHP_EOL);
    }
}