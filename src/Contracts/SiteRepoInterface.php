<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Contracts;

interface SiteRepoInterface
{
    /**
     * @param string $path
     * @return void
     */
    public function setPath(string $path): void;

    /**
     * @return RepositoryInterface|null
     */
    public function site(): ?RepositoryInterface;

    /**
     * @return RepositoryInterface|null
     */
    public function user(): ?RepositoryInterface;

    /**
     * @return RepositoryInterface|null
     */
    public function menu(): ?RepositoryInterface;

    /**
     * @return RepositoryInterface|null
     */
    public function meta(): ?RepositoryInterface;

    /**
     * @return RepositoryInterface|null
     */
    public function content(): ?RepositoryInterface;
}
