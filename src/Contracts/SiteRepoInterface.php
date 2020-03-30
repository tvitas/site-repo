<?php
namespace tvitas\SiteRepo\Contracts;

interface SiteRepoInterface
{
    public function setPath($path);
    public function site();
    public function user();
    public function menu();
    public function meta();
    public function content();
}
