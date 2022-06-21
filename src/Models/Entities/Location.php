<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Entities;

use tvitas\SiteRepo\Contracts\ArrayListInterface;
use tvitas\SiteRepo\Contracts\EntityInterface;
use tvitas\SiteRepo\Contracts\LocationEntityInterface;

final class Location implements EntityInterface, LocationEntityInterface
{
    /** @var array|string[] */
    private array $fillable = [
        'location',
        'title',
        'description',
        'icon',
        'children',
    ];
    /** @var string */
    private string $location;
    /** @var string */
    private string $title;
    /** @var string */
    private string $description;
    /** @var string */
    private string $icon;
    /** @var ArrayListInterface|null */
    private ?ArrayListInterface $children;

    public function fillable(): ?array
    {
        return $this->fillable;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setChildren(ArrayListInterface $children): void
    {
        $this->children = $children;
    }

    public function getChildren(): ?ArrayListInterface
    {
        return $this->children;
    }
}
