<?php

declare(strict_types=1);


namespace App\Owner\Application;

use App\Owner\Domain\Owner;
use App\Owner\Domain\OwnerRepository;
use App\Shared\Domain\CommandHandlerInterface;

final class CreateOwnerCommandHandler implements CommandHandlerInterface
{
    public function __construct(private readonly OwnerRepository $repository)
    {
    }

    public function handle($ownerData): Owner
    {
        $owner = new Owner(
            $ownerData['name'],
            $ownerData['uuid'],
            $ownerData['email'],
            $ownerData['password']
        );
        $owner->createOwner();
        $this->repository->save($owner);

        return $owner;
    }

}