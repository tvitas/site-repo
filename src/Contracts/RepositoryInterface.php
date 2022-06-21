<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Contracts;

interface RepositoryInterface
{
    /**
     * @return void
     */
    public function init(): void;

    /**
     * @return ArrayListInterface|null
     */
    public function get(): ?ArrayListInterface;
}
