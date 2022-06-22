<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Contracts;

interface MenuEntityInterface
{
    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void;

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void;

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void;

    /**
     * @param string $template
     * @return void
     */
    public function setTemplate(string $template): void;

    /**
     * @param string $icon
     * @return void
     */
    public function setIcon(string $icon): void;

    /**
     * @param ArrayListInterface $items
     * @return void
     */
    public function setItems(ArrayListInterface $items): void;

    /**
     * @return string|null
     */
    public function getType(): ?string;

    /**
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * @return string|null
     */
    public function getTemplate(): ?string;

    /**
     * @return string|null
     */
    public function getIcon(): ?string;

    /**
     * @return ArrayListInterface|null
     */
    public function getItems(): ?ArrayListInterface;
}
