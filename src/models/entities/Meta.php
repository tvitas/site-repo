<?php
namespace tvitas\SiteRepo\Models\Entities;
use tvitas\SiteRepo\Contracts\EntityInterface;

final class Meta implements EntityInterface
{
	private $fillable = [
		'name',
		'title',
		'description',
		'template',
		'teaser',
		'origin',
	];

	private $name = '';

	private $title = '';

	private $description = '';

	private $template = '';

	private $teaser = '0';

	private $origin = '';

	public function fillable()
	{
		return $this->fillable;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
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

	public function setTemplate($template)
	{
		$this->template = $template;
	}

	public function getTemplate()
	{
		return $this->template;
	}

	public function setTeaser($teaser)
	{
		$this->teaser = $teaser;
	}

	public function getTeaser()
	{
		return $this->teaser;
	}

	public function setOrigin($origin)
	{
		$this->origin = $origin;
	}

	public function getOrigin()
	{
		return $this->origin;
	}
}
