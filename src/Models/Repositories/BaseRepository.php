<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Repositories;

use tvitas\SiteRepo\Contracts\ArrayListInterface;
use tvitas\SiteRepo\Contracts\RepositoryInterface;
use tvitas\SiteRepo\Environment as Env;
use tvitas\SiteRepo\Traits\XpathQueryTrait;

abstract class BaseRepository implements RepositoryInterface
{
    use XpathQueryTrait;

    /** @var array|null */
    protected ?array $reservedNames;
    /** @var ArrayListInterface|null */
    protected ?ArrayListInterface $content;
    /** @var array|null */
    protected ?array $contentMime;
    /**@var string|null */
    protected ?string $path;
    /** @var string|null */
    protected ?string $metaInf;
    /** @var Env */
    protected Env $env;

    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->env = Env::getInstance();
        $this->path = $path;
        $this->contentMime = $this->env->get('contentMime',
            [
                'text/plain',
                'text/html'
            ]);
        $this->reservedNames = $this->env->get('reservedNames',
            [
                'meta-inf',
                'footer',
                'header',
                'meta-inf.xml',
                'site-inf.xml',
                'menu-inf.xml',
            ]);
        $this->metaInf = $this->env->get('meta_inf', 'meta-inf.xml');
    }

    /**
     * @return void
     */
    abstract public function init(): void;

    /**
     * @return ArrayListInterface|null
     */
    public function get(): ?ArrayListInterface
    {
        return $this->content;
    }
}
