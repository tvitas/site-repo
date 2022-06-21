<?php
declare(strict_types=1);

namespace tvitas\SiteRepo\Contracts;

use Countable;

interface ArrayListInterface extends Countable
{
    /**
     * @return ArrayListInterface|null
     */
    public function all(): ?ArrayListInterface;

    /**
     * @param EntityInterface $item
     * @return void
     */
    public function add(EntityInterface $item): void;

    /**
     * @return int
     */
    public function count(): int;

    /**
     * @return mixed
     */
    public function first(): mixed;

    /**
     * @return mixed
     */
    public function last(): mixed;

    /**
     * @param int $index
     * @return mixed
     */
    public function get(int $index): mixed;

    /**
     * @param mixed $value
     * @param string $member
     * @return int
     */
    public function indexOf(mixed $value, string $member): int;

    /**
     * @param mixed $value
     * @param string $member
     * @return EntityInterface|null
     */
    public function find(mixed $value, string $member): ?EntityInterface;

    /**
     * @param string $member
     * @param string $order
     * @return ArrayListInterface
     */
    public function sort(string $member, string $order): ArrayListInterface;
}
