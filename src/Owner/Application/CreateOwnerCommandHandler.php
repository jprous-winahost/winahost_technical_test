<?php

declare(strict_types=1);


namespace App\Owner\Application;

use App\Owner\Domain\Owner;
use App\Owner\Domain\OwnerRepository;
use App\Owner\Domain\ValueObjects\OwnerEmailVO;
use App\Owner\Domain\ValueObjects\OwnerNameVO;
use App\Owner\Domain\ValueObjects\OwnerPasswordVO;
use App\Owner\Domain\ValueObjects\OwnerUuidVO;
use App\Shared\Domain\CommandHandlerInterface;
use Exception;

final class CreateOwnerCommandHandler implements CommandHandlerInterface
{
    public function __construct(private readonly OwnerRepository $repository)
    {
    }

    /**
     * @throws Exception
     */
    public function handle($ownerData): Owner
    {
        $name = new OwnerNameVO($ownerData['name']);
        $uuid = new OwnerUuidVO($ownerData['uuid']);
        $email = new OwnerEmailVO($ownerData['email']);
        $password = new OwnerPasswordVO($ownerData['password']);

        $owner = new Owner(
            $name,
            $uuid,
            $email,
            $password
        );
        $owner->createOwner();
        $this->repository->save($owner);

        return $owner;
    }

}