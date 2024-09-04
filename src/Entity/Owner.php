<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


#[ORM\Entity]
#[UniqueEntity(fields: ["uuid", "email"])]
class Owner
{
    #[ORM\Column(
        name: "id",
        type: "bigint",
        nullable: false
    )]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private int $id;

    #[ORM\Column(
        name: "uuid",
        type: "string",
        length: 255,
        nullable: false
    )]
    private string $uuid;

    #[ORM\Column(
        name: "name",
        type: "string",
        length: 255,
        nullable: false
    )]
    private string $name;

    #[ORM\Column(
        name: "email",
        type: "string",
        length: 255,
        nullable: false
    )]
    private string $email;

    #[ORM\Column(
        name: "password",
        type: "string",
        length: 255,
        nullable: false
    )]
    private string $password;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

}
