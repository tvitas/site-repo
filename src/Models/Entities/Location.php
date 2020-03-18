<?php
namespace tvitas\SiteRepo\Models\Entities;
use tvitas\SiteRepo\Contracts\EntityInterface;

final class Location implements EntityInterface
{
    private $fillable = [
        'location',
        'title',
        'description',
        'icon',
        'children',
    ];

    private $location;

    private $title;

    private $description;

    private $icon;

    private $children;

    public function fillable()
    {
        return $this->fillable;
    }

    public function setLocation($location)
    {
    	$this->location = $location;
    }

    public function getLocation()
    {
    	return $this->location;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function setChildren($children)
    {
        $this->children = $children;
    }

    public function getChildren()
    {
        return $this->children;
    }
}
