<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Contracts;

interface LocationEntityInterface
{
    /**
     * @param string $location
     * @return void
     */
    public function setLocation(string $location): void;

    /**
     * @return string|null
     */
    public function getLocation(): ?string;

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
     * @param string $icon
     * @return void
     */
    public function setIcon(string $icon): void;

    /**
     * @return string|null
     */
    public function getIcon(): ?string;

    /**
     * @param ArrayListInterface $children
     * @return void
     */
    public function setChildren(ArrayListInterface $children): void;

    /**
     * @return ArrayListInterface|null
     */
    public function getChildren(): ?ArrayListInterface;
}
