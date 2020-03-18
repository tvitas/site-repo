<?php
namespace tvitas\SiteRepo\Models\Repositories;

use tvitas\SiteRepo\Contracts\RepositoryInterface;
use tvitas\SiteRepo\Collections\NaiveArrayList;
use tvitas\SiteRepo\Models\Entities\Location;
use tvitas\SiteRepo\Traits\XpathQueryTrait;
use tvitas\SiteRepo\Models\Entities\Menu;
use tvitas\SiteRepo\Environment as Env;

class MenuRepository implements RepositoryInterface
{
    use XpathQueryTrait;

    private $content;

    private $env;

    private $metaInf;

    public function __construct()
    {
        $this->env = Env::getInstance();
        $this->metaInf = $this->env->get('menu_inf', 'menu-inf.xml');
    }

    public function init()
    {
        $this->content = $this->parseXmlMenu();
    }

    public function get()
    {
        return $this->content;
    }

    public function byType($type)
    {
        return $this->content->find($type, 'type');
    }

    private function parseXmlMenu()
    {
        $query = '//*/menutype';
        $dirname = $this->env->get('database');
        $collection = new NaiveArrayList();
        $menuitems = $this->xpathQuery($dirname, $query);
        foreach ($menuitems as $item) {
            $menu = new Menu;
            $uris = [];
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

    private function parseUris($uris)
    {
        $collection = new NaiveArrayList();
        foreach ($uris as $key => $uri) {
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
