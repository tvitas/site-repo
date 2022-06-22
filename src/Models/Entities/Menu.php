<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Entities;

use tvitas\SiteRepo\Contracts\EntityInterface;
use tvitas\SiteRepo\Contracts\ArrayListInterface;
use tvitas\SiteRepo\Contracts\MenuEntityInterface;

final class Menu implements EntityInterface, MenuEntityInterface
{
    /** @var array|string[] */
    private array $fillable = [
        'type',
        'title',
        'description',
        'icon',
        'template',
        'items',
    ];
    /** @var string */
    private string $type;
    /** @var string */
    private string $title;
    /** @var string */
    private string $description;
    /** @var string */
    private string $icon;
    /** @var string */
    private string $template;
    /** @var ArrayListInterface */
    private ArrayListInterface $items;

    /**
     * @return array|string[]|null
     */
    public function fillable(): ?array
    {
        return $this->fillable;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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
     * @param string $icon
     * @return void
     */
    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    /**
     * @param ArrayListInterface $items
     * @return void
     */
    public function setItems(ArrayListInterface $items): void
    {
        $this->items = $items;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return ArrayListInterface|null
     */
    public function getItems(): ?ArrayListInterface
    {
        return $this->items;
    }

    /**
     * @param string $template
     * @return void
     */
    public function setTemplate(string $template): void
    {
        $this->template = $template;
    }

    /**
     * @return string|null
     */
    public function getTemplate(): ?string
    {
        return $this->template;
    }
}
