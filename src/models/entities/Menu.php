<?php
namespace tvitas\SiteRepo\Models\Entities;
use tvitas\SiteRepo\Contracts\EntityInterface;

final class Menu implements EntityInterface
{
    private $fillable = [
        'type',
        'title',
        'description',
        'icon',
        'template',
        'items',
    ];

    private $type;

    private $title;

    private $description;

    private $icon;

    private $template;

    private $items;

    public function fillable()
    {
        return $this->fillable;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getTemplate()
    {
        return $this->template;
    }
}
