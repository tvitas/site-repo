<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Models\Repositories;

use tvitas\SiteRepo\Environment as Env;
use tvitas\SiteRepo\Models\Entities\User;
use tvitas\SiteRepo\Traits\XpathQueryTrait;
use tvitas\SiteRepo\Contracts\EntityInterface;
use tvitas\SiteRepo\Collections\NaiveArrayList;
use tvitas\SiteRepo\Contracts\ArrayListInterface;
use tvitas\SiteRepo\Contracts\RepositoryInterface;

class UserRepository implements RepositoryInterface
{
    use XpathQueryTrait;

    /** @var ArrayListInterface|null */
    private ?ArrayListInterface $content;

    /** @var Env */
    private Env $env;

    /** @var string|null */
    private ?string $metaInf;

    public function __construct()
    {
        $this->env = Env::getInstance();
        $this->metaInf = $this->env->get('user_inf', 'user-inf.xml');
    }

    /**
     * @return void
     */
    public function init(): void
    {
        $this->content = $this->parseXmlUser();
    }

    /**
     * @return ArrayListInterface|null
     */
    public function get(): ?ArrayListInterface
    {
        return $this->content;
    }

    /**
     * @param string $name
     * @return EntityInterface
     */
    public function byName(string $name): EntityInterface
    {
        return $this->content->find($name, 'name');
    }

    /**
     * @param string $email
     * @return EntityInterface
     */
    public function byEmail(string $email): EntityInterface
    {
        return $this->content->find($email, 'email');
    }

    /**
     * @param string $role
     * @return EntityInterface
     */
    public function byRole(string $role): EntityInterface
    {
        return $this->content->find($role, 'role');
    }

    /**
     * @return ArrayListInterface
     */
    private function parseXmlUser(): ArrayListInterface
    {
        $collection = new NaiveArrayList();
        $dirname = $this->env->get('database');
        $query = '//*/user';
        $attributes = $this->xpathQuery($dirname, $query);
        foreach ($attributes as $attribute) {
            $user = new User();
            /** @var array $fillables */
            $fillables = $user->fillable();
            foreach ($fillables as $fillable) {
                $fillable = strtolower($fillable);
                $setter = 'set' . ucfirst($fillable);
                $user->$setter(sprintf('%s', $attribute->$fillable));
            }
            $collection->add($user);
        }
        return $collection;
    }
}
