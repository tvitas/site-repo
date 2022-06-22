<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Entities;

use tvitas\SiteRepo\Contracts\EntityInterface;
use tvitas\SiteRepo\Contracts\MetaEntityInterface;

final class Meta implements EntityInterface, MetaEntityInterface
{
    /** @var array|string[] */
    private array $fillable = [
        'name',
        'title',
        'description',
        'template',
        'teaser',
        'origin',
    ];
    /** @var string */
    private string $name = '';
    /** @var string */
    private string $title = '';
    /** @var string */
    private string $description = '';
    /** @var string */
    private string $template = '';
    /** @var bool */
    private bool $teaser = false;
    /** @var string */
    private string $origin = '';

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
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
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

    /**
     * @param string|null $teaser
     * @return void
     */
    public function setTeaser(?string $teaser): void
    {
        $this->teaser = (bool)$teaser;
    }

    /**
     * @return bool
     */
    public function getTeaser(): bool
    {
        return $this->teaser;
    }

    /**
     * @param string $origin
     * @return void
     */
    public function setOrigin(string $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
}
