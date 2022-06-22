<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Entities;

use tvitas\SiteRepo\Contracts\EntityInterface;
use tvitas\SiteRepo\Contracts\SiteEntityInterface;

final class Site implements EntityInterface, SiteEntityInterface
{
    /** @var array|string[] */
    private array $fillable = [
        'name',
        'slogan',
        'acronym',
    ];

    /** @var string */
    private string $name;
    /** @var string */
    private string $slogan;
    /** @var string */
    private string $acronym;

    /**
     * @return array|string[]
     */
    public function fillable(): array
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $slogan
     * @return void
     */
    public function setSlogan(string $slogan): void
    {
        $this->slogan = $slogan;
    }

    /**
     * @return string
     */
    public function getSlogan(): string
    {
        return $this->slogan;
    }

    /**
     * @param string $acronym
     * @return void
     */
    public function setAcronym(string $acronym): void
    {
        $this->acronym = $acronym;
    }

    /**
     * @return string
     */
    public function getAcronym(): string
    {
        return $this->acronym;
    }
}
