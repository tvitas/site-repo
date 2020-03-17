<?php
namespace tvitas\SiteRepo\Models\Entities;
use tvitas\SiteRepo\Contracts\EntityInterface;

final class Site implements EntityInterface
{
	private $fillable = [
		'name',
		'slogan',
		'acronym',
	];

	private $name;

	private $slogan;

	private $acronym;

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

	public function setSlogan($slogan)
	{
		$this->slogan = $slogan;
	}

	public function getSlogan()
	{
		return $this->slogan;
	}

	public function setAcronym($acronym)
	{
		$this->acronym = $acronym;
	}

	public function getAcronym()
	{
		return $this->acronym;
	}
}
