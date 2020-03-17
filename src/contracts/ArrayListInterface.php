<?php
namespace tvitas\SiteRepo\Contracts;

interface ArrayListInterface
{
    public function all();
    public function add($item);
    public function count();
    public function first();
    public function last();
    public function get($index);
    public function indexOf($value, $member);
    public function find($value, $member);
    public function sort($member, $order);
}
