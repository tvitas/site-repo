<?php
namespace tvitas\SiteRepo\Contracts;

interface FileEntityInterface
{
    public function setOrigin($origin);
    public function getOrigin();
    public function setOrder($order);
    public function getOrder();
    public function setMime($mime);
    public function getMime();
    public function setSize($size);
    public function getSize();
    public function setFilename($filename);
    public function getFilename();
	public function setFileContent($fileContent);
    public function getFileContent();
}
