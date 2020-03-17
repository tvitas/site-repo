<?php
namespace tvitas\SiteRepo\Models\Repositories;

use tvitas\SiteRepo\Contracts\RepositoryInterface;
use tvitas\SiteRepo\Collections\NaiveArrayList;
use tvitas\SiteRepo\Models\Entities\Site;
use tvitas\SiteRepo\Traits\XpathQueryTrait;
use tvitas\SiteRepo\Environment as Env;

class SiteRepository implements RepositoryInterface
{
    use XpathQueryTrait;

    private $content;

    private $env;

    private $metaInf;

    public function __construct()
    {
        $this->env = Env::getInstance();
        $this->metaInf = $this->env->get('site_inf');
    }

    public function init()
    {
        $this->content = $this->parseXmlSite();
    }

    public function get()
    {
        return $this->content;
    }

    private function parseXmlSite()
    {
        $collection = new NaiveArrayList();
        $dirname = $this->env->get('database');
        $query = '//*/sitemeta';
        $attributes = $this->xpathQuery($dirname, $query);
        foreach ($attributes as $attribute) {
            $site = new Site();
            $fillables = $site->fillable();
            foreach ($fillables as $fillable) {
                $fillable = strtolower($fillable);
                $setter = 'set' . ucfirst($fillable);
                $site->$setter(sprintf('%s', $attribute->$fillable));
            }
            $collection->add($site);
        }
        return $collection;
    }
}


