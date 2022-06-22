<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Contracts;

interface MetaEntityInterface
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
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void;

    /**
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * @param string $template
     * @return void
     */
    public function setTemplate(string $template): void;

    /**
     * @return string|null
     */
    public function getTemplate(): ?string;

    /**
     * @param string|null $teaser
     * @return void
     */
    public function setTeaser(?string $teaser): void;

    /**
     * @return bool
     */
    public function getTeaser(): bool;

    /**
     * @param string $origin
     * @return void
     */
    public function setOrigin(string $origin): void;

    /**
     * @return string|null
     */
    public function getOrigin(): ?string;
}
