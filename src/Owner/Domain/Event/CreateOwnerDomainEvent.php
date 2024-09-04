<?php

declare(strict_types=1);


namespace App\Owner\Domain\Event;


use App\Owner\Domain\Owner;
use Symfony\Contracts\EventDispatcher\Event;

final class CreateOwnerDomainEvent extends Event
{
    public const NAME = 'work_entry.created';

    public function __construct(private readonly Owner $owner)
    {
    }

    /**
     * @return Owner
     */
    public function getOwnerEntry(): Owner
    {
        return $this->owner;
    }
}