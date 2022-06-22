<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Contracts;

interface EntityInterface
{
    /**
     * @return array|null
     */
    public function fillable(): ?array;
}
