<?php
namespace tvitas\SiteRepo\Contracts;

interface SiteEntityInterface
{
	public function setName($name);
	public function getName();
	public function setSlogan($slogan);
	public function getSlogan();
	public function setAcronym($acronym);
	public function getAcronym();
}
