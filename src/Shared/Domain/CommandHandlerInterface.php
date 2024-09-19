<?php

namespace App\Shared\Domain;

use App\Owner\Domain\Owner;

interface CommandHandlerInterface
{
    public function handle($ownerData): Owner;
}