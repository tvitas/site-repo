<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Collections;

use Countable;
use tvitas\SiteRepo\Contracts\EntityInterface;
use tvitas\SiteRepo\Traits\MethodResolverTrait;
use tvitas\SiteRepo\Contracts\ArrayListInterface;

class NaiveArrayList implements ArrayListInterface
{
    use MethodResolverTrait;

    /** @var Countable|null */
    private ?Countable $items;

    /**
     * @return ArrayListInterface|null
     */
    public function all(): ?Countable
    {
        return $this->items;
    }

    /**
     * @param EntityInterface $item
     * @return void
     */
    public function add(EntityInterface $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @return mixed|null
     */
    public function first(): mixed
    {
        $count = $this->count();
        if (0 !== $count) {
            return $this->items[0];
        }
        return null;
    }

    /**
     * @return mixed|null
     */
    public function last(): mixed
    {
        $count = $this->count();
        if (0 !== $count) {
            return $this->items[$count - 1];
        }
        return null;
    }

    /**
     * @param int $index
     * @return mixed|null
     */
    public function get(int $index): mixed
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

    /**
     * @param mixed $value
     * @param string $member
     * @return int
     */
    public function indexOf(mixed $value, string $member): int
    {
        $count = $this->count();
        if (0 !== $count) {
            $getter = $this->resolveMethodAndProperty($member, $this->items[0]);
            if ("" !== $getter) {
                for ($i = 0; $i < $count; $i++) {
                    if ($value === $this->items[$i]->$getter()) {
                        return $i;
                    }
                }
            }
        }
        return -1;
    }

    /**
     * @param mixed $value
     * @param string $member
     * @return EntityInterface|null
     */
    public function find(mixed $value, string $member): ?EntityInterface
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


    /**
     * @param string $member
     * @param string $order
     * @return ArrayListInterface
     */
    public function sort(string $member, string $order): ArrayListInterface
    {
        if ($this->count() > 1) {
            $getter = $this->resolveMethodAndProperty($member, $this->items[0]);
            if ($getter) {
                $array = (array)$this->items;
                usort($array,
                    function ($a, $b) use ($order, $getter) {
                        $valueA = $a->$getter();
                        $valueB = $b->$getter();
                        return ($valueA <=> $valueB) * ($order === 'desc' ? -1 : 1);
                    });
            }
        }
        return $this;
    }
}
