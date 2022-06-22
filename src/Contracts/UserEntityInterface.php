<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Contracts;

interface UserEntityInterface
{
    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void;

    /**
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * @param string $password
     * @return void
     */
    public function setPassword(string $password): void;

    /**
     * @return string|null
     */
    public function getPassword(): ?string;

    /**
     * @param string $role
     * @return void
     */
    public function setRole(string $role): void;

    /**
     * @return string|null
     */
    public function getRole(): ?string;

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;
}
