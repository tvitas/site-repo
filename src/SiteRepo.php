<?php
declare(strict_types=1);

namespace tvitas\SiteRepo;

use tvitas\SiteRepo\Contracts\RepositoryInterface;
use tvitas\SiteRepo\Contracts\SiteRepoInterface;
use tvitas\SiteRepo\Environment as Env;
use tvitas\SiteRepo\Models\Repositories\DirectoryRepository;
use tvitas\SiteRepo\Models\Repositories\FileRepository;
use tvitas\SiteRepo\Models\Repositories\MenuRepository;
use tvitas\SiteRepo\Models\Repositories\MetaRepository;
use tvitas\SiteRepo\Models\Repositories\SiteRepository;
use tvitas\SiteRepo\Models\Repositories\UserRepository;

class SiteRepo implements SiteRepoInterface
{
    /** @var Environment */
    private Env $env;

    /** @var string */
    private string $path;

    public function __construct()
    {
        $this->env = Env::getInstance();
        $this->env->load();
        $this->path = $this->env->get('database_data');
    }

    /**
     * @param string $path
     * @return void
     */
    public function setPath(string $path): void
    {
        $this->path = $this->env->get('database_data') . '/' . trim($path, '/');
    }

    /**
     * @param string $path
     * @return void
     */
    public function setFullPath(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return RepositoryInterface|null
     */
    public function site(): ?RepositoryInterface
    {
        $repository = null;
        if ($this->isSite()) {
            $repository = new SiteRepository();
            $repository->init();
        }
        return $repository;
    }

    /**
     * @return UserRepository|null
     */
    public function user(): ?RepositoryInterface
    {
        $repository = null;
        if ($this->isUser()) {
            $repository = new UserRepository();
            $repository->init();
        }
        return $repository;
    }

    /**
     * @return MenuRepository|null
     */
    public function menu(): ?MenuRepository
    {
        $repository = null;
        if ($this->isMenu()) {
            $repository = new MenuRepository();
            $repository->init();
        }
        return $repository;
    }

    /**
     * @return MetaRepository|null
     */
    public function meta(): ?MetaRepository
    {
        $repository = null;
        if ($this->isMeta()) {
            $repository = new MetaRepository($this->path);
            $repository->init();
        }
        return $repository;
    }

    /**
     * @return RepositoryInterface|null
     */
    public function content(): ?RepositoryInterface
    {
        $repository = null;
        if ($this->isDir()) {
            $repository = new DirectoryRepository($this->path);
            $repository->init();
        }

        if ($this->isFile()) {
            $repository = new FileRepository($this->path);
            $repository->init();
        }
        return $repository;
    }

    /**
     * @return bool
     */
    private function isDir(): bool
    {
        return is_dir($this->path);
    }

    /**
     * @return bool
     */
    private function isFile(): bool
    {
        return is_file($this->path);
    }

    /**
     * @return bool
     */
    private function isMenu(): bool
    {
        return file_exists($this->env->get('database') . '/' . $this->env->get('menu_inf'));
    }

    /**
     * @return bool
     */
    private function isSite(): bool
    {
        return file_exists($this->env->get('database') . '/' . $this->env->get('site_inf'));
    }

    /**
     * @return bool
     */
    private function isUser(): bool
    {
        return file_exists($this->env->get('database') . '/' . $this->env->get('user_inf'));
    }

    /**
     * @return bool
     */
    private function isMeta(): bool
    {
        if ($this->isFile()) {
            return file_exists(dirname($this->path) . '/' . $this->env->get('meta_inf'));
        }
        if ($this->isDir()) {
            return file_exists($this->path . '/' . $this->env->get('meta_inf'));
        }
        return false;
    }
}
