<?php

namespace App\Owner\Domain;

interface OwnerRepository
{
    public function save(Owner $owner): void;
}