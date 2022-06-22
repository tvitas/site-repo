<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Entities;

use tvitas\SiteRepo\Contracts\EntityInterface;
use tvitas\SiteRepo\Contracts\UserEntityInterface;

final class User implements EntityInterface, UserEntityInterface
{
    /** @var array|string[] */
    private array $fillable = [
        'name',
        'email',
        'password',
        'role',
        'description',
    ];

    /** @var string */
    private string $name;
    /** @var string */
    private string $email;
    /** @var string */
    private string $password;
    /** @var string */
    private string $role;
    /** @var string */
    private string $description;

    /**
     * @return array|string[]|null
     */
    public function fillable(): ?array
    {
        return $this->fillable;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = strtolower($email);
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $password
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $role
     * @return void
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}
