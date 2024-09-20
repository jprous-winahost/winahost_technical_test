<?php

declare(strict_types=1);


namespace App\Owner\Domain;


use App\Owner\Domain\ValueObjects\OwnerEmailVO;
use App\Owner\Domain\ValueObjects\OwnerNameVO;
use App\Owner\Domain\ValueObjects\OwnerPasswordVO;
use App\Owner\Domain\ValueObjects\OwnerUuidVO;
use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Owner\Domain\Event\CreateOwnerDomainEvent;

final class Owner extends AggregateRoot
{
    private OwnerNameVO $name;
    private OwnerUuidVO $uuid;
    private OwnerEmailVO $email;
    private OwnerPasswordVO $password;

    public function __construct(OwnerNameVO $name, OwnerUuidVO $uuid, OwnerEmailVO $email, OwnerPasswordVO $password)
    {
        $this->name = $name;
        $this->uuid = $uuid;
        $this->email = $email;
        $this->password = $password;
    }

    public function createOwner(): void
    {
        $this->addEvent(new CreateOwnerDomainEvent($this));
    }

    public function name(): OwnerNameVO
    {
        return $this->name;
    }

    public function uuid(): OwnerUuidVO
    {
        return $this->uuid;
    }

    public function email(): OwnerEmailVO
    {
        return $this->email;
    }

    public function password(): OwnerPasswordVO
    {
        return $this->password;
    }

}