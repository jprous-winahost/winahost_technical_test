<?php

declare(strict_types=1);


namespace App\Owner\Infrastructure\Persistence;


use App\Owner\Domain\Owner;
use App\Owner\Domain\OwnerRepository;
use App\Owner\Domain\ValueObjects\OwnerUuidVO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

final class OwnerDoctrineRepository extends ServiceEntityRepository implements OwnerRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, \App\Entity\Owner::class);
    }

    public function getSingleOwner(OwnerUuidVO $ownerUuidVO)
    {
        // TODO:: How you will return the resultant owner's data?
    }

    /**
     * @throws Exception
     */
    public function save(Owner $owner): void
    {
        //throw new Exception('This feature it has not implemented yet');

         $ownerEntity = new \App\Entity\Owner();

         $ownerEntity->setUuid($owner->uuid());
         $ownerEntity->setName($owner->name());
         $ownerEntity->setEmail($owner->email());
         $ownerEntity->setPassword($owner->password());

         $this->getEntityManager()->persist($ownerEntity);
         $this->getEntityManager()->flush();
    }
}