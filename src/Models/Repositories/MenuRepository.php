<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Repositories;

use SimpleXMLElement;
use tvitas\SiteRepo\Environment as Env;
use tvitas\SiteRepo\Models\Entities\Menu;
use tvitas\SiteRepo\Traits\XpathQueryTrait;
use tvitas\SiteRepo\Models\Entities\Location;
use tvitas\SiteRepo\Contracts\EntityInterface;
use tvitas\SiteRepo\Collections\NaiveArrayList;
use tvitas\SiteRepo\Contracts\ArrayListInterface;
use tvitas\SiteRepo\Contracts\RepositoryInterface;

class MenuRepository implements RepositoryInterface
{
    use XpathQueryTrait;

    /** @var ArrayListInterface */
    private ArrayListInterface $content;

    /** @var Env */
    private Env $env;

    /** @var string|null */
    private ?string $metaInf;

    public function __construct()
    {
        $this->env = Env::getInstance();
        $this->metaInf = $this->env->get('menu_inf', 'menu-inf.xml');
    }


    /**
     * @return void
     */
    public function init(): void
    {
        $this->content = $this->parseXmlMenu();
    }

    /**
     * @return ArrayListInterface
     */
    public function get(): ArrayListInterface
    {
        return $this->content;
    }

    /**
     * @param string $type
     * @return EntityInterface
     */
    public function byType(string $type): EntityInterface
    {
        return $this->content->find($type, 'type');
    }

    /**
     * @return ArrayListInterface
     */
    private function parseXmlMenu(): ArrayListInterface
    {
        $query = '//*/menutype';
        $dirname = $this->env->get('database');
        $collection = new NaiveArrayList();
        $menuItems = $this->xpathQuery($dirname, $query);
        foreach ($menuItems as $item) {
            $menu = new Menu;
            $menu->setType(sprintf('%s', $item->type));
            $menu->setTitle(sprintf('%s', $item->title));
            $menu->setDescription(sprintf('%s', $item->description));
            $menu->setIcon(sprintf('%s', $item->icon));
            $menu->setTemplate(sprintf('%s', $item->template));
            $menu->setItems($this->parseUris($item->uri));
            $collection->add($menu);
        }
        return $collection;
    }

    /**
     * @param SimpleXMLElement $uris
     * @return ArrayListInterface
     */
    private function parseUris(SimpleXMLElement $uris): ArrayListInterface
    {
        $collection = new NaiveArrayList();
        foreach ($uris as $uri) {
            $location = new Location;
            $location->setLocation(sprintf('%s', $uri->loc));
            $location->setTitle(sprintf('%s', $uri->title));
            $location->setDescription(sprintf('%s', $uri->description));
            $location->setIcon(sprintf('%s', $uri->icon));
            if (!empty($uri->children)) {
                foreach ($uri->children as $children) {
                    $location->setChildren($this->parseUris($children));
                }
            }
            $collection->add($location);
        }
        return $collection;
    }
}
