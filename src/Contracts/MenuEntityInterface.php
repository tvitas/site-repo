<?php
namespace tvitas\SiteRepo\Contracts;

interface MenuEntityInterface
{
    public function setType($type);
    public function setTitle($title);
    public function setDescription($description);
    public function setTemplate($template);
    public function setIcon($icon);
    public function setItems($items);
    public function getType();
    public function getTitle();
    public function getDescription();
    public function getTemplate();
    public function getIcon();
    public function getItems();
}
