<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Repositories;

use tvitas\SiteRepo\Environment as Env;
use tvitas\SiteRepo\Models\Entities\Site;
use tvitas\SiteRepo\Traits\XpathQueryTrait;
use tvitas\SiteRepo\Collections\NaiveArrayList;
use tvitas\SiteRepo\Contracts\ArrayListInterface;
use tvitas\SiteRepo\Contracts\RepositoryInterface;

class SiteRepository implements RepositoryInterface
{
    use XpathQueryTrait;

    private ?ArrayListInterface $content;

    private Env $env;

    private ?string $metaInf;

    public function __construct()
    {
        $this->env = Env::getInstance();
        $this->metaInf = $this->env->get('site_inf', 'site-inf.xml');
    }

    /**
     * @return void
     */
    public function init(): void
    {
        $this->content = $this->parseXmlSite();
    }

    /**
     * @return ArrayListInterface|null
     */
    public function get(): ?ArrayListInterface
    {
        return $this->content;
    }

    /**
     * @return ArrayListInterface|null
     */
    private function parseXmlSite(): ?ArrayListInterface
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
