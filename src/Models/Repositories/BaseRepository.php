<?php
namespace tvitas\SiteRepo\Models\Repositories;

use tvitas\SiteRepo\Contracts\RepositoryInterface;
use tvitas\SiteRepo\Collections\NaiveArrayList;
use tvitas\SiteRepo\Traits\XpathQueryTrait;
use tvitas\SiteRepo\Environment as Env;

abstract class BaseRepository implements RepositoryInterface
{
    use XpathQueryTrait;

    protected $reservedNames;

    protected $content;

    protected $contentMime;

    protected $path;

    protected $metaInf;

    protected $env;

	public function __construct($path)
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

    abstract public function init();

    public function get()
    {
        return $this->content;
    }
}
