<?php
namespace tvitas\SiteRepo\Collections;
use tvitas\SiteRepo\Contracts\ArrayListInterface;
use tvitas\SiteRepo\Traits\MethodResolverTrait;

class NaiveArrayList implements ArrayListInterface
{
    use MethodResolverTrait;

    private $items = [];

    public function all()
    {
        return $this->items;
    }

    public function add($item)
    {
        array_push($this->items, $item);
    }

    public function count()
    {
        return count($this->items);
    }

    public function first()
    {
        $count = $this->count();
        if (0 !== $count) {
            return $this->items[0];
        }
        return null;
    }

    public function last()
    {
        $count = $this->count();
        if (0 !== $count) {
            return $this->items[$count-1];
        }
        return null;
    }

    public function get($index)
    {
        $count = $this->count();
        if (0 !== $count) {
            if (($index > $count - 1) or ($index < 0)) {
                return null;
            }
            return $this->items[$index];
        }
        return null;
    }

    public function indexOf($value, $member)
    {
        $count = $this->count();
        if (0 !== $count) {
            $getter = $this->resolveMethodAndProperty($member, $this->items[0]);
            if ("" !== $getter) {
                for ($i = 0; $i < $count; $i ++) {
                    if ($value === $this->items[$i]->$getter()) {
                        return $i;
                    }
                }
            }
        }
        return -1;
    }

    public function find($value, $member)
    {
        if (0 !== $this->count()) {
            $getter = $this->resolveMethodAndProperty($member, $this->items[0]);
            if ("" !== $getter) {
                foreach ($this->items as $key => $item) {
                    if ($value === $item->$getter()) {
                        return $this->items[$key];
                    }
                }
            }
        }
        return null;
    }

    public function sort($member, $order)
    {
        if ($this->count() > 1) {
            $getter = $this->resolveMethodAndProperty($member, $this->items[0]);
            if ($getter) {
                usort($this->items,
                function ($a, $b) use ($order, $getter)
                {
                    $valueA = $a->$getter();
                    $valueB = $b->$getter();
                    return ($valueA <=> $valueB) * ($order === 'desc' ? -1 : 1);
                });
            }
        }
       return $this;
    }
}
