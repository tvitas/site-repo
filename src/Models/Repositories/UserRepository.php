<?php
namespace tvitas\SiteRepo\Models\Repositories;

use tvitas\SiteRepo\Contracts\RepositoryInterface;
use tvitas\SiteRepo\Collections\NaiveArrayList;
use tvitas\SiteRepo\Traits\XpathQueryTrait;
use tvitas\SiteRepo\Models\Entities\User;
use tvitas\SiteRepo\Environment as Env;

class UserRepository implements RepositoryInterface
{
    use XpathQueryTrait;

    private $content;

    private $env;

    private $metaInf;

    public function __construct()
    {
        $this->env = Env::getInstance();
        $this->metaInf = $this->env->get('user_inf', 'user-inf.xml');
    }

    public function init()
    {
        $this->content = $this->parseXmlUser();
    }

    public function get()
    {
        return $this->content;
    }

    public function byName($name)
    {
        return $this->content->find($name, 'name');
    }

    public function byEmail($email)
    {
        return $this->content->find($email, 'email');
    }

    public function byRole($role)
    {
        return $this->content->find($role, 'role');
    }

    private function parseXmlUser()
    {
        $collection = new NaiveArrayList();
        $dirname = $this->env->get('database');
        $query = '//*/user';
        $attributes = $this->xpathQuery($dirname, $query);
        foreach ($attributes as $attribute) {
            $user = new User();
            $fillables = $user->fillable();
            foreach ($fillables as $fillable) {
                $fillable = strtolower($fillable);
                $setter = 'set' . ucfirst($fillable);
                $user->$setter(sprintf('%s', $attribute->$fillable));
            }
            $collection->add($site);
        }
        return $collection;
    }
}
