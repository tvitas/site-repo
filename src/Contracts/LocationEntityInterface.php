<?php
namespace tvitas\SiteRepo\Contracts;

interface LocationEntityInterface
{
    public function setLocation($location);
    public function getLocation();
    public function setTitle($title);
    public function getTitle();
    public function setDescription($description);
    public function getDescription();
    public function setIcon($icon);
    public function getIcon();
    public function setChildren($children);
    public function getChildren();
}
