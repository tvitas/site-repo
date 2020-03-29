<?php
namespace tvitas\SiteRepo\Contracts;

interface MetaEntityInterface
{
	public function setName($name);
	public function getName();
	public function setTitle($title);
	public function getTitle();
	public function setDescription($description);
	public function getDescription();
	public function setTemplate($template);
	public function getTemplate();
	public function setTeaser($teaser);
	public function getTeaser();
	public function setOrigin($origin);
	public function getOrigin();
}
