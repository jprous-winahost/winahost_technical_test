<?php

declare(strict_types=1);


namespace App\Owner\Domain;


use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Owner\Domain\Event\CreateOwnerDomainEvent;

final class Owner extends AggregateRoot
{
    private string $name;
    private string $uuid;
    private string $email;
    private string $password;

    public function __construct(string $name, string $uuid, string $email, string $password)
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

    public function name(): string
    {
        return $this->name;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

}