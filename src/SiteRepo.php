<?php
namespace tvitas\SiteRepo;
use tvitas\SiteRepo\Environment as Env;
use tvitas\SiteRepo\Models\Repositories\DirectoryRepository;
use tvitas\SiteRepo\Models\Repositories\FileRepository;
use tvitas\SiteRepo\Models\Repositories\MenuRepository;
use tvitas\SiteRepo\Models\Repositories\SiteRepository;
use tvitas\SiteRepo\Models\Repositories\MetaRepository;

class SiteRepo
{
    private $env;

    private $path;

    public function __construct($path)
    {
        $this->env = Env::getInstance();
        $this->path = $path;
    }

    public function site()
    {
        $repository = null;
        if ($this->isSite()) {
            $repository = new SiteRepository();
            $repository->init();
        }
        return $repository;
    }

    public function menu()
    {
        $repository = null;
        if ($this->isMenu()) {
            $repository = new MenuRepository();
            $repository->init();
        }
        return $repository;
    }

    public function meta()
    {
        $repository = null;
        if ($this->isMeta()) {
            $repository = new MetaRepository($this->path);
            $repository->init();
        }
        return $repository;
    }

    public function content()
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

    private function isDir()
    {
        return is_dir($this->path);
    }

    private function isFile()
    {
        return is_file($this->path);
    }

    private function isMenu()
    {
        return (file_exists($this->env->get('database')) . '/' . $this->env->get('menu_inf'));
    }

    private function isSite()
    {
        return (file_exists($this->env->get('database')) . '/' . $this->env->get('site_inf'));
    }


    private function isMeta()
    {
        if ($this->isFile()) {
            return file_exists(dirname($this->path) . '/' . $this->env->get('meta_inf'));
        }
        if ($this->isDir()) {
            return file_exists($this->path .'/' . $this->env->get('meta_inf'));
        }
        return false;
    }
}
